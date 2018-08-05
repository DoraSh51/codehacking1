@extends('layouts.admin')

@section('content')


    <h1>Comments</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Post</th>
                    <th>Replies </th>
                    <th> </th>
                    <th> </th>
                    
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('homepost', ['id' => $comment->post_id])}}">View Post</a></td>
                    <td><a href="{{route('replies.show', ['id' => $comment->id])}}">View Replies</a></td>
                    <td>
                        @if ($comment->is_active==1)
                            {!! Form::open(['method'=>'PATCH',  'action'=>['PostCommentsControler@update',$comment->id]]) !!}
                                <div class="form-group">
                                    <input type="hidden" name="is_active" id="is_active" value="0">
                                    {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}
                                </div>
                            {!! Form::close() !!}
                        @else 
                            {!! Form::open(['method'=>'PATCH',  'action'=>['PostCommentsControler@update',$comment->id]]) !!}
                                <div class="form-group">
                                    <input type="hidden" name="is_active" id="is_active" value="1">
                                    {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                                </div>
                            {!! Form::close() !!}
                        @endif
                    </td> 
                    <td>
                        {!! Form::open(['method'=>'DELETE',  'action'=>['PostCommentsControler@destroy',$comment->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                     
                </tr>
                
     
            </tbody>
        </table>
   

@endsection