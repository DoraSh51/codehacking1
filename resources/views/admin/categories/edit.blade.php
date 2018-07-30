@extends('layouts.admin')

@section('content')

<h3> Categories</h3>
    @if (Session::has('deleted_category'))
        <p class="bg-danger"> {{session('deleted_category')}}</p>
    @endif
    <div class="col-sm-6">        
    {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id], 'files'=> true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name Category') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-4']) !!}
        </div>

    {!! Form::close() !!} 
    {!! Form::open(['method'=>'DELETE',  'action'=>['AdminCategoriesController@destroy',$category->id], 'files'=> true]) !!}
        <div class="form-group">
             {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-4']) !!}
        </div>

    {!! Form::close() !!}
 
    <div class="row">
        @include('includes/form_error')  
    </div>
</div> 
@endsection

