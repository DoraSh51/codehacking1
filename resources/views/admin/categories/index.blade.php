@extends('layouts.admin')

@section('content')

<h3> Categories</h3>
@if (Session::has('deleted_category'))
    <p class="bg-danger"> {{session('deleted_category')}}</p>
@endif

<div class="col-sm-6">
        
    {!! Form::open(['method'=>'post', 'action'=>'AdminCategoriesController@store', 'files'=> true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name Category') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!} 
     
    <div class="row">
        @include('includes/form_error')  
    </div>

</div>


<div class="col-sm-6">

    @if ($categories)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href ="{{route('categoryedit', [ $category->id])}}">{{$category->name}}</td>
                    <td>{{$category->created_at ? $category->created_at : "No Date"}}</td>
                    <td>{{$category->updated_at ?  $category->updated_at : "No Date"}}</td>
                </tr>
                @endforeach
     
            </tbody>
        </table>
    @endif
</div>


@endsection

