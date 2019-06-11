<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Comment;
use App\User;
use App\Category;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Input;

use App\Events\PostHasViewed;

class PostController extends Controller
{

    public function __construct()
    {
        //$this->middleware('permission:full-access');

        //$this->middleware('permission:post-list');

        $this->middleware('permission:post-list');
         $this->middleware('permission:post-create');
         $this->middleware('permission:post-edit');
         $this->middleware('permission:post-delete');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (Auth::user()) {
            if (Auth::user()->sudo == 1) {
                $all = Post::orderBy('id', 'DESC')->paginate(50);
                /* $all = Post::with(['categories' => function($query){
             $query->orderBy('id', 'asc');
         }])->paginate(50);*/


            } else {
                $all = Post::where('author', Auth::user()->id)->get();
                //Order::where('user_id', auth()->id)->get();
            }
        }


        return view('dashboard.post.list', ['posts' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $categories = Category::all();

        return view('dashboard.post.create', compact('categories', $categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'alias' => 'required',
        ]);
        //
        //dd($request->all());
        $method = $request->method();

        //$image = $request->file('img');
        //$image = $request->image;
        $image = $request->file('image');
        $slider_photo = Input::file('slider');

        $name = $request->input('name');
        $post = new Post;
        $post->meta_title = $request->meta_title;
        $post->meta_desc = $request->meta_desc;
        $post->category_id = $request->category;
        $post->title = $request->meta_title;//not used
        $post->content = $request->content;
        $post->alias = $request->alias;
        $post->author = Auth::user()->id;
        //$post->img = 6;

        if ($image) {
            $filename = Auth::user()->id . rand(1000, 9999) . $image->getClientOriginalName();
            $image->move(public_path() . '/dashboards/image/', $filename);
            $db_name_string = 'dashboards/image/' . $filename;

            $post->img = $db_name_string;
        }
        if ($slider_photo) {
            $last_id = DB::table('posts')->orderBy('id', 'desc')->first();
            /*if(!isset($last_id)){
                $last_id = 1;
            }*/
            $id = $last_id->id + 1;
            //dd($last_id);
            $dir = public_path() . '/dashboards/image/' . $id;
            if (!is_dir($dir)) {
                $dir = mkdir(public_path() . '/dashboards/image/' . $id, 0777, true);
            }
            //dd($dir);
            $this->cleanDir($dir);
            $db_name_string = array();
            foreach ($slider_photo as $index => $item) {

                $filename = Auth::user()->id . rand(1000, 9999) . $item->getClientOriginalName();
                $item->move(public_path() . '/dashboards/image/' . $id, $filename);
                $name_string = 'dashboards/image/' . $id . '/' . $filename;
                $db_name_string[] = $name_string;
            }
            $post->slider_photo = json_encode($db_name_string);

        }

        $post->save();

        /*
        $post = Post::create(['title' => 'Hello Second World']);
$post->categories()->attach([1,2]); // Attaching Category IDs to pivot table
echo $post->id; // Getting the ID
$post = Post::create(['title' => 'Hello World']);
$post->categories()->save(Category::create(['category' => 'Leaflets']));

//

$category_ids = $input['category_id']; //html name in array 
$post_cat_data = array();
foreach($category_ids as $index => $value) {
    if (!empty($value)) {           
        $post_cat_data[] = [            
        'category_id' => $value,            
       ];
    }       
 }                  
$post->post_category()->createMany($post_cat_data);
*/

        //return view('dashboard.post.list');
        return redirect()->route('post.index')
            ->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //return view('dashboard.post.edit');

        $post = Post::findOrFail($id);

        //event(new PostHasViewed($post
        $post->increment('view_count');

        $comments = Comment::where('commentable_id', $id)->get();
        $category = Category::where('id', $post->category_id)->get('name');//->toArray();


        //$comments = DB::table('comments')->where('commentable_type' , '=' ,$id )->get();
        return view('dashboard.post.show', [
            'post' => $post,
            'comments' => $comments,
            'category' => $category[0],
            //'category' => $category[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //render form for the post edit page
        $post = Post::findOrFail($id);

        $categories = Category::all();
        /* //$method = $request->method();


     $post->meta_title = $request->meta_title;
     $post->meta_desc = $request->meta_desc;
     $post->category_id = $request->category;
     $post->title = $request->title;
     $post->content = $request->content;
      //$post->img = 6;



     $post->save();*/

        return view('dashboard.post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $all = Post::all();
        //update post from the post edit page (url: dashboard/post/{id}/edit)
        //$post = Post::findOrFail($id);
        $image = $request->file('image');
        $slider_photo = Input::file('slider');
        $name = $request->input('name');
        if (isset($request) && !empty($request->meta_title)) {
            DB::table('posts')
                ->where('id', '=', $id)
                ->update(array(
                    'meta_title' => $request->meta_title,
                    'alias' => $request->alias . '',
                    'category_id' => $request->category,
                    'meta_desc' => $request->meta_desc,
                    'title' => $request->title,
                    'content' => $request->content,
                ));
            if ($image) {
                $filename = Auth::user()->id . rand(1000, 9999) . $image->getClientOriginalName();
                $image->move(public_path() . '/dashboards/image/', $filename);
                $db_name_string = 'dashboards/image/' . $filename;

                /* Deleting old files attached for the post - hz kak?
                DB::table('posts')->where('id','=', $id)->select('img')->get();
                */

                DB::table('posts')->where('id', '=', $id)->update(array('img' => $db_name_string));

                // $post->img = $db_name_string;
            }
            if ($slider_photo) {
                $dir = public_path() . '/dashboards/image/' . $id;
                if (!is_dir($dir)) {
                    $dir = mkdir(public_path() . '/dashboards/image/' . $id, 0777, true);
                }
                //dd($dir);
                $this->cleanDir($dir);


                $db_name_string = array();
                foreach ($slider_photo as $index => $item) {

                    $filename = Auth::user()->id . rand(1000, 9999) . $item->getClientOriginalName();
                    $item->move(public_path() . '/dashboards/image/' . $id, $filename);
                    $name_string = 'dashboards/image/' . $id . '/' . $filename;
                    $db_name_string[] = $name_string;
                }
                DB::table('posts')->where('id', '=', $id)->update(array('slider_photo' => json_encode($db_name_string)));
                //return dd(json_encode($a));
                //return dd(Input::file('slider'));
            }
            //надо редирест на /post - НЕ вью
            //return view('dashboard.post.list' , ['posts'=> $all]);
            //return Redirect::action('PostController@index' , ['posts'=> $all]);
            return redirect()->route('post.index')
                ->with('success', 'Post with id ' . $id . ' Updated!');
        } else {
            return redirect()->route('post.index')
                ->with('error', 'Post with id ' . $id . ' NOT Updated!');
        }

        //return($post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saveDelete = false;
        //
        $post = Post::findOrFail($id);
        $comments = Comment::where('commentable_id', $id)->where('commentable_type' , 'App\Post')->delete();
        $post->delete();
        $saveDelete = true;
        //DB::table('admin_settings')->where('id',  '=',  $id)->delete();
        // App\AdminSettings::find(1)->where('id',  '=',  $id)->delete();
        //return  $id . ' was deleted!';
        //return  redirect('dashboard/post');
        if ($saveDelete) {
            return redirect()->route('post.index')
                ->with('success', 'Post with id ' . $id . ' deleted!');
        } else {
            return redirect()->route('post.index')
                ->with('error', 'Post with id ' . $id . ' NOT deleted!');
        }
    }

    public function cleanDir($dir)
    {
        $files = glob($dir . "/*");
        $c = count($files);
        if (count($files) > 0) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }
    }


}
