@extends('layouts.admin')

@section('content')

    <h3>Create Post</h3>
    
    
        {!! Form::open(['method'=>'post', 'action'=>'AdminPostsController@store', 'files'=> true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
        <!--    {!! Form::text('category_id',null,['class'=>'form-control']) !!}-->
            {!! Form::select('category_id', array('1'=>'PHP', '2'=>'C#'),null,['class'=>'form-control','style'=>'height:35px' ]) !!}
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
             {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!} 
     
    <div class="row">
        @include('includes/form_error')  
    </div>

@endsection