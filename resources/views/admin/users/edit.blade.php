@extends('layouts.admin')

@section('content')

<h3>Edit Users</h3>
<div class="row">
    <div class="col-sm-3">
        <img height ="200" src="{{$user->photo ? '/images/'.$user->photo->path : '/images/nophoto.jpg'}}">
    </div>
    <div class="col-sm-9">
       {!! Form::model($user,['method'=>'PATCH',  'action'=>['AdminUsersController@update',$user->id], 'files'=> true]) !!}
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
            {!! Form::select('role_id',$roles,null,['class'=>'form-control','style'=>'height:35px' ]) !!}
        </div>    
        <div class="form-group" style="height:65px" >
            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active', array('1'=>'Active', '0'=>'Not active'),null,['class'=>'form-control','style'=>'height:35px' ]) !!}
        </div>

        <div class="form-group" style="height:65px" >
            {!! Form::label('photo_id','Choose photo') !!}
            {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <br>
        <div class="form-group">
             {!! Form::submit('Edit User',['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
  
</div>
<div class="row">
    @include('includes/form_error')
</div>
@endsection