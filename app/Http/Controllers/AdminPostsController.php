<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photo;
use App\Category;
use App\Comment;
use App\Http\Requests\PostsCreateRequest;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(2);
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories =Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
   
        $user =  Auth::user();
        
        if ($file = $request->file('photo_id')){
            
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo =Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;
            
        }
        
        $user->posts()->create($input);
    //    Post::create($input);
    
        
   //   return $input;
        return redirect('/admin/posts');
     
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
        $post = Post::findOrFail($id);
        $comment = $post->comments;
        
        return view('admin.comments.show', compact('comment'));
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
   
       
        $post = Post::findOrFail($id);
        
        $categories = Category::pluck('name','id','user')->all();
        
    //    return  dd($post) ;
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {
        $input = $request->all();
   
        $user =  Auth::user();
        
        if ($file = $request->file('photo_id')){
            
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo =Photo::create(['path'=>$name]);
            $input['photo_id']=$photo->id;
        }
        
        $user->posts()->whereId($id)->first()->update($input);
        
         
         return redirect('/admin/posts');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::findOrFail($id);
        
        unlink(public_path()."/images/".$post->photo->path);
        
        $post->delete();
        
        Session::flash('deleted_post','The Post has been deleted');
        
         return redirect('/admin/posts');
        //
    }
    
    public function post($id){
        
        $post = Post::findOrFail($id)  ; 
 
        $comments = Comment::all()->where('post_id', $id)->where('is_active',1);
        
        
    //    return $comments;
        return view('post',compact('post','comments'));
    }
}
