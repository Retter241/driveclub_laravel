<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Post;
use App\Comment;
use App\Category;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Auth;
use Session;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:full-access');
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
            $categories = Category::orderBy('id','DESC')->paginate(50);
            
        
        return view('dashboard.category.index',compact('categories' , 'errors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('dashboard.category.create');
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
        $category = new Category;
        $category->name = $request->get('name');
        $category->alias = $request->get('alias');
       $category->save();

        //return back();
        return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);
        $posts = Post::where('category_id',$id)->get();

        return view('dashboard.category.show',['category' => $category , 'posts' => $posts]);
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
        $category = Category::findOrFail($id);

        return view('dashboard.category.edit',['category' => $category]);
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
        $this->validate($request, [
            'name' => 'required',
            'alias' => 'required'
        ]);


        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->alias = $request->input('alias');
        $category->save();


     


        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
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
         $category = Category::findOrFail($id); 
         if(Post::where('category_id' , $id)->get()){
            return  redirect('dashboard/categories')->with('error','Can not delete category with posts!');
         } 
         else{
             $category->delete();
            return  redirect('dashboard/categories')->with('success','Category delete successfully');
         }
       
         //DB::table('admin_settings')->where('id',  '=',  $id)->delete();
       // App\AdminSettings::find(1)->where('id',  '=',  $id)->delete();
        //return  $id . ' was deleted!';
         
    }
}
