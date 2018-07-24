@extends('layouts.admin')

@section('content')

<h3>Create Users</h3>
    {!! Form::open(['method'=>'post', 'action'=>'AdminUsersController@store', 'files'=> true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role') !!}
        {!! Form::select('role_id',['0'=>'Choose option']+$roles,null,['class'=>'form-control','style'=>'height:35px' ]) !!}
    </div>    
    <div class="form-group" style="height:65px" >
        {!! Form::label('is_active','Status') !!}
        {!! Form::select('is_active', array('1'=>'Active', '0'=>'Not active'),0,['class'=>'form-control','style'=>'height:35px' ]) !!}
    </div>
    
    <div class="form-group" style="height:65px" >
        {!! Form::label('file','Choose file') !!}
        {!! Form::file('file', null,['class'=>'form-control']) !!}
    </div>
    
    
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    
    <br>
    <div class="form-group">
         {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
    </div>
    
    {!! Form::close() !!}
    
    @include('includes/form_error')
@endsection