<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use App\Project;
use App\User;
use App\Category;
use App\Comment;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function __construct() {
            $this->middleware('permission:project-list');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()){
            if(Auth::user()->sudo == 1){
                $all = Project::orderBy('id','DESC')->paginate(50);
            }
            else{
                $all = Project::where('author', Auth::user()->id)->get();
                //Order::where('user_id', auth()->id)->get();
            }
        }


        return view('dashboard.project.list' , ['projects'=> $all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.project.create' , compact('categories',$categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'meta_title' => 'required',
            'alias' => 'required',
        ]);
        //$last_id = DB::table('projects')->orderBy('id', 'desc')->first();
        $last_id = 0;
        //if(!isset($last_id)){$last_id = 1;}
        $image =  $request->file('image');
        $slider_photo = Input::file('slider');

        $project = new Project;
        $project->meta_title = $request->meta_title;
        $project->meta_desc = $request->meta_desc;
        $project->category_id = $request->category;
        $project->title = $request->meta_title;//not used
        $project->content = $request->content;
        $project->alias = $request->alias;
        $project->author = Auth::user()->id;
        $project->view_count = 0;

        if ($image)
        {
            $id = $last_id + 1;
            $filename =Auth::user()->id.rand(1000,9999).$image->getClientOriginalName();
            $image->move(public_path().'/dashboards/image/project/', $filename);
            $db_name_string  = 'dashboards/image/project/'.$filename;
            $project->img = $db_name_string;
        }
        if($slider_photo){
            $id = $last_id + 1;
            $dir = public_path().'/dashboards/image/project/'.$id;
            if (!is_dir($dir)) {
                $dir = mkdir(public_path().'/dashboards/image/project/'.$id , 0777, true);
            }
            //dd($dir);
            $this->cleanDir($dir);
            $db_name_string = array();
            foreach ($slider_photo as $index => $item) {

                $filename =Auth::user()->id.rand(1000,9999).$item->getClientOriginalName();
                $item->move(public_path().'/dashboards/image/project/'.$id , $filename);
                $name_string = 'dashboards/image/project/'.$id.'/'.$filename;
                $db_name_string[] = $name_string;
            }
            $project->slider_photo = json_encode($db_name_string);

        }
        $project->save();



        return redirect()->route('project.index')
            ->with('success','Project created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $project = Project::findOrFail($id);
     $project->increment('view_count');
        $project->view_count = $project->view_count+1;
        $comments = Comment::where('commentable_id', $id)->get();
        $category = Category::where('id', $project->category_id)->get('name');//->toArray();

        return view('dashboard.project.show', [
            'project' => $project,
            'comments' => $comments,
            'category' => $category[0],
            //'category' => $category[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //render form for the project edit page
        $project = Project::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.project.edit', ['project' => $project, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update post from the project edit page (url: dashboard/project/{id}/edit)
        $image = $request->file('image');
        $slider_photo = Input::file('slider');
        $name = $request->input('name');
        if (isset($request) && !empty($request->meta_title)) {
            DB::table('projects')
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
                $image->move(public_path() . '/dashboards/image/project/', $filename);
                $db_name_string = 'dashboards/image/project/' . $filename;

                DB::table('projects')->where('id', '=', $id)->update(array('img' => $db_name_string));

                // $post->img = $db_name_string;
            }
            if ($slider_photo) {
                $dir = public_path() . '/dashboards/image/project/' . $id;
                if (!is_dir($dir)) {
                    $dir = mkdir(public_path() . '/dashboards/image/project/' . $id, 0777, true);
                }
                //dd($dir);
                $this->cleanDir($dir);


                $db_name_string = array();
                foreach ($slider_photo as $index => $item) {

                    $filename = Auth::user()->id . rand(1000, 9999) . $item->getClientOriginalName();
                    $item->move(public_path() . '/dashboards/image/project/' . $id, $filename);
                    $name_string = 'dashboards/image/project/' . $id . '/' . $filename;
                    $db_name_string[] = $name_string;
                }
                DB::table('projects')->where('id', '=', $id)->update(array('slider_photo' => json_encode($db_name_string)));
                //return dd(json_encode($a));
                //return dd(Input::file('slider'));
            }
            //надо редирест на /post - НЕ вью
            //return view('dashboard.post.list' , ['posts'=> $all]);
            //return Redirect::action('PostController@index' , ['posts'=> $all]);
            return redirect()->route('project.index')
                ->with('success', 'project with id ' . $id . ' Updated!');
        } else {
            return redirect()->route('project.index')
                ->with('error', 'project with id ' . $id . ' NOT Updated!');
        }

        //return($post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saveDelete = false;
        $project = Project::findOrFail($id);
        $comments = Comment::where('commentable_id', $id)->where('commentable_type' , 'App\Project')->delete();
        $project->delete();
        $saveDelete = true;
        //DB::table('admin_settings')->where('id',  '=',  $id)->delete();
        // App\AdminSettings::find(1)->where('id',  '=',  $id)->delete();
        //return  $id . ' was deleted!';
        //return  redirect('dashboard/post');
        if ($saveDelete) {
            return redirect()->route('project.index')
                ->with('success', 'project with id ' . $id . ' deleted!');
        } else {
            return redirect()->route('project.index')
                ->with('error', 'project with id ' . $id . ' NOT deleted!');
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

    public function addCommentProject(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->parent_id = 0;
        $comment->user()->associate($request->user());
        $project = Project::find($request->project_id);

        $project->comments()->save($comment);
        return back();
        //return redirect()->route('post.show' , $request->post_id);
    }
}
