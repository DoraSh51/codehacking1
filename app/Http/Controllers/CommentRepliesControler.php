<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\CommentReply;


class CommentRepliesControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $replies = CommentReply::all();
        
        return view('admin.comments.replies.index', compact('replies'));
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
    
    public function createReply(Request $request){
        
        $user = Auth::user();
        
        $data =[
            'comment_id' => $request->comment_id,
            'author' => $user->name,
            'email' => $user->email,
    //        'photo' => $user->photo->path,
            'body' => $request->body
            ]; 
        
//        return $data;
        CommentReply::create($data);
        
        $replies = CommentReply::all();
        
        return redirect()->back();
   //     return view('admin.comments.replies.index', compact('replies'));
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
        $comment = Comment::findOrFail($id);
        $replies = $comment->replies;
      //  $replies = CommentReply::all()->where('comment_id',$id); 
        return  view('admin.comments.replies.show',  compact('replies'));
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
      
      CommentReply::findOrFail($id)->update($request->all());
      
      return redirect('admin/comment/replies');
      
  //    return $request;
        
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
       CommentReply::findOrFail($id)->delete();
        return redirect('admin/comment/replies');  
    }
}
