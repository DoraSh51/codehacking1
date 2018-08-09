@extends('layouts.admin')

@section('content')

    <h3>Edit Post</h3>
    <div class="col-sm-4">
        <img class="img-responsive" src="{{$post->photo ? '/images/'.$post->photo->path : 'http://placehold.it/150x150'}}">
    </div>
    <div class="col-sm-8">
        {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update',$post->id ], 'files'=> true]) !!}
            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id','Category') !!}
            <!--    {!! Form::text('category_id',null,['class'=>'form-control']) !!}-->
                {!! Form::select('category_id', [''=>'Choose Category']+$categories,null,['class'=>'form-control','style'=>'height:35px' ]) !!}
            </div>

            <div class="form-group" style="height:65px" >
                {!! Form::label('photo_id','Choose photo') !!}
                {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body','Description') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                 {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

        {!! Form::close() !!} 
        {!! Form::open(['method'=>'DELETE',  'action'=>['AdminPostsController@destroy',$post->id], 'files'=> true]) !!}
            <div class="form-group">
                 {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

        {!! Form::close() !!}
        
    </div> 
    <div class="row">
        @include('includes/form_error')  
    </div>

@endsection


