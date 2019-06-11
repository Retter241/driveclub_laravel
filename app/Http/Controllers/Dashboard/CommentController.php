<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Input;

use App\User;
use App\Post;
use App\Comment;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Auth;
use Session;

class CommentController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:comment-list');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $errors = array();
        if(Auth::user()->sudo == 1){
            $comments = Comment::orderBy('id','DESC')->paginate(50);
        }
        else{
            $comments = Comment::where('user_id',Auth::user()->id)->paginate(50);
        }
      
        return view('dashboard.comment.index',compact('comments' , 'errors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->parent_id = 0;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        
        $post->comments()->save($comment);
        //return back();
        return redirect()->route('post.show' , $request->post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $comment = Comment::findOrFail($id);  
        $comment->delete();
         return redirect()->route('comments.index');
    }
}
