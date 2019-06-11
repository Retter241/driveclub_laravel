<?php

namespace App\Http\Controllers\Site;
/////https://github.com/rennokki/befriended
use App\Permission;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Post;
use App\Category;
use App\Comment;
use App\Like;
use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
use Auth;
use DB;
use View;
use SoftDeletes;
//https://github.com/spatie/laravel-permission

//

class SiteController extends Controller
{
    public $is_follow =false;
    //public $user_instance;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*if(Auth::check()){
           $this->user_instance =  User::where('id' , Auth::user()->id)->first();
        }*/
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
 
        $catblock_1 =  Post::where('category_id' ,1 )->take(4)->get();
        $catblock_2 =  Post::where('category_id' ,2 )->take(4)->get();
        $catblock_3 =  Post::where('category_id' ,4 )->take(4)->get();
        $catblock_4 =  Post::where('category_id' ,7 )->take(4)->get();
 
        return view('site.index' , [
            'catblock_1' => $catblock_1,
            'catblock_2' => $catblock_2,
            'catblock_3' => $catblock_3,
            'catblock_4' => $catblock_4,
        ]);
    }

    /**
     * Show the page with all news .
     *
     * @return (obj) $news
     */
    public function getNewsList()
    {
        $posts = Post::OrderBy('id','DESC')->take(6)->get();
        $categories = Category::OrderBy('id','DESC')->get();

        return view('site.news' , ['posts'=>$posts,'categories'=>$categories]);
    }

    /**
     * Show the page with all news .
     *
     * @return (obj) $news
     */
    public function getProjectsList()
    {
        //$project = Project::OrderBy('view_count','ASC')->take(6)->get();
        //$project = Project::with('user')->orderBy('view_count','ASC')->paginate(50);
        $project = Project::OrderBy('view_count','ASC')->paginate(10);
        $categories = Category::OrderBy('id','DESC')->get();

        return view('site.projects' , ['projects'=>$project,'categories'=>$categories]);
    }
    /**
     * Show the page with all news by category.
     *
     * @return (obj) $news
     */
    public function getAllByCategory(/*$id */ $alias, Request $request)
    {
        //$categories = Category::find(1);
        //$categories->post()->where('category_id', $id)->get();
      

    $category = Category::where('alias' , $alias)->get('name');
    $c_id = Category::where('alias' , $alias)->get('id');
      //dd($category[0]->name);
        $posts = Post::where('category_id',$c_id[0]->id)->paginate(10);
        $projects = Project::where('category_id',$c_id[0]->id)->get();


        return view('site.category' , [
            'posts' => $posts ,
            'category' => $category[0]->name,
            'projects' => $projects
        ]);
    }

     /**
     * Show the page with one news .
     *
     * @return (obj) $One news
     */
    public function getNewsItem(/*$id*/ $alias)
    {

         $post = Post::where('alias',$alias)->first();
         if($post){
             $post->increment('view_count');
             $comments = Comment::where('commentable_id' , $post->id)->get();
             return view('site.new' , ['post'=>$post , 'comments' => $comments]);
         }
         else{
             abort(404);
         }

    }

    public function getProjectsItem(/*$id*/ $alias)
    {

        $project = Project::where('alias',$alias)->first();
        if($project){
            $project->increment('view_count');
            $comments = Comment::where('commentable_id' , $project->id)->where('commentable_type' , 'App\Project')->get();

            if(Auth::check()){
              $this->is_follow = User::findOrFail(Auth::id())->isFollowing(User::findOrFail($project->author));
            }
            return view('site.project' , ['project'=>$project , 'comments' => $comments , 'is_follow' => $this->is_follow]);
        }
        else{
            abort(404);
        }

    }


    /**
     * add comment post
     *
     * @return $redirect
     */
    public function addCommentPost(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->parent_id = 0;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        
        $post->comments()->save($comment);
        //return back();
        return $comment;
        //return redirect()->route('post.show' , $request->post_id);
    }

    /**
     * add comment post
     *
     * @return $redirect
     */
    public function addCommentProject(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->parent_id = 0;
        $comment->user()->associate($request->user());
        $project = Project::find($request->project_id);
        //dd($request->project_id);
        $project->comments()->save($comment);
        //return back();
        return $comment;
        //return redirect()->route('post.show' , $request->post_id);
    }






    public function getCategoryList () 
    {
        $categories = Category::all();

        return view('site.categories',['categories' => $categories]);
    }

    /**
     * Section Users
     *
     * @return (obj)
     */
    public function getUserList()
    {
        $data = User::all();
        return view('site.users',['users' => $data]);
    }


     public function getUserItem($id)
    {  
       Auth::check() ? $a_id =Auth::id() : $a_id = 1; 
        

        $followings = array();
        $user = User::findOrFail($id);
        $user_posts = Post::where('author',$id)->get();
        $user_projects = Project::where('author',$id)->get();
  

        $this->is_follow = User::findOrFail($a_id)->isFollowing(User::findOrFail($id));
        /*$this->is_follow =  User::findOrFail(Auth::id())->isFollowing(User::where('id' , $id)->get());*/
       //dd(  $this->is_follow);

        $collection = User::followedBy(User::findOrFail($id))->get();
        for ($i=0; $i < count($collection) ; $i++) { 
          $followings[] = $collection[$i]->id;
        }
       
          $followings_projects= Project::whereIn('author' , $collection)->get();
       
        return view('site.user',[
            'user' => $user,
            'user_posts' => $user_posts,
            'user_projects' => $user_projects,
            'is_follow'=>$this->is_follow,
            'followings' => $followings,
            'followings_projects'=>$followings_projects
            ]);
    }

    /**
     *  .
     *
     * @return $redirect
     */
    public function polling(Request $request)
    {

        if(Auth::check()){
            $user = User::where('id' , Auth::user()->id)->first();
            if(isset($request->level)){
                if($request->level == 1){
                    //dd($request->level);
                    $count = 0;
                    if($request->q1 == 'a'){ $count++;}
                    if($request->q2 == 'a'){$count++;}
                    if($request->q3 == 'a'){$count++;}
                    if($request->q4 == 'a'){$count++;}
                    if($request->q5 == 'a'){$count++;}
                    if($request->q6 == 'a'){$count++;}
                    if($request->q7 == 'a'){$count++;}
                    if($request->q8 == 'a'){$count++;}
                    if($request->q9 == 'a'){$count++;}
                    if($request->q10 == 'a'){$count++;}
                        if($count == 10){
                            $user->assignRole('commenter');
                            return redirect()->back();
                        }
                        else{
                            return redirect()->back()
                                ->with('error' , 'Правильно '.$count.'/10 ответов! Для прохождения теста необходимо ответить на все вопросы.');
                        }
                    //getUserItem$user->assignRole('commenter');

                }
                if($request->level == 2){
                    //dd($request->level);
                    $count = 0;
                    if($request->q1 == 'a'){ $count++;}
                    if($request->q2 == 'a'){$count++;}
                    if($request->q3 == 'a'){$count++;}
                    if($request->q4 == 'a'){$count++;}
                    if($request->q5 == 'a'){$count++;}
                    if($request->q6 == 'a'){$count++;}
                    if($request->q7 == 'a'){$count++;}
                    if($request->q8 == 'a'){$count++;}
                    if($request->q9 == 'a'){$count++;}
                    if($request->q10 == 'a'){$count++;}
                        if($count == 10){
                            $user->assignRole('moderator');
                            return redirect()->back();
                        }
                        else{
                            return redirect()->back()
                                ->with('error' , 'Правильно '.$count.'/10 ответов! Для прохождения теста необходимо ответить на все вопросы.');
                        }
                }

            }


            if(!$user->hasRole('commenter')){//у юзера базовый доступ
                return view('site.polling' , ['level' => 1]);
            }
            elseif(!$user->hasRole('moderator')){//может комментировать
                return view('site.polling' , ['level' => 2]);
            }
            else{//полный доступ
                return view('site.polling' , ['level' => 999]);
            }
        }
        else{//необходима авторизация
            return view('site.polling' , ['level' => 0]);
        }
        //$user = User::where('id' , Auth::user()->id)->first();
        //$user->hasPermissionTo('edit articles');
        //dd($user->hasRole('commenter') );
        //dd($user->hasRole('moderator') );

        
    }
/*_token=NB9aNN4JrdCmYKtOz1ntkbX26N3duznKSrAqwOTA&user=1&q1=a&q2=c&q3=c&q4=b&q5=b&q6=c&q7=c&q8=c&q9=c&q10=c*/




    public function feeds(Request $request)
    {
       $project = array();
        $categories = array();
      if(Auth::check()){

      
        $collection = User::followedBy(User::findOrFail(Auth::id()))->get();
        for ($i=0; $i < count($collection) ; $i++) { 
          $followings[] = $collection[$i]->id;
        }
          $followings_projects= Project::whereIn('author' , $collection)->get();

           //'followings_projects'=>$followings_projects
       
  //dd($followings_projects);
          return view('site.feeds' , [
            'projects'=>$project,
            'followings_projects'=>$followings_projects
          ]);
      }
      else{
       
         return view('site.feeds' , ['projects'=>$project,'categories'=>$categories]);
      }
    }


public function likePost($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Post', $id);
        return redirect()->back();
    }

    public function likeProject($id)
    {
        // here you can check if product exists or is valid or whatever
       
        //$a= count($projects->likes);
        $this->handleLike('App\Project', $id);
        $projects = Project::where('id',$id)->with('likes')->get();

        return $projects[0]->likes->count();
        //return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }




    public function followUser($id)
    {
        $user = User::where('id', Auth::id())->first();
        $follower = User::where('id', $id)->first();
        $user->follow($follower);

        return redirect()->back();
    }

    public function unfollowUser($id)
    {
        $user = User::where('id', Auth::id())->first();
        $follower = User::where('id', $id)->first();
        $user->unfollow($follower);
        return redirect()->back();
    }


    public function search(Request $request)
{
    $projects = array();
    $posts = array();
    $projects = $request->text;

        if($request->category == 0 && isset($request->text)){
            $projects = Project::where('meta_title', 'like', '%' . $request->text . '%')->get();
            return view('site.search', ['projects' => $projects]);
        }

        if($request->category != 0 && isset($request->text)){

            $posts = Post::where('meta_title', 'like', '%' . $request->text . '%')->where('category_id', $request->category)->get();
            //dd(empty($posts));
            return view('site.search', ['posts' => $posts]);
        }
        //$projects = Project::where('meta_title', 'like', '%' . $request->text . '%')->where('category_id', $request->category)->get();
        //$posts = Post::where('meta_title', 'like', '%' . $request->text . '%')->where('category_id', $request->category)->get();

    /* if(isset($request->category)){
       $projects= $projects->where('category_id' , $request->category)->get();
       $posts= $posts->where('category_id' , $request->category)->get();
     }*/

}


    public function About() 
    {
        return view('site.about');
    }

    public function getAds() 
    {
        return view('site.ads');
    }

    public function getSupport() 
    {
        return view('site.support');
    }    
}
