@extends('layouts.admin')

@section('styles')

<link rel='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css'>

@endsection


@section('content')

<h1>Upload Media </h1>

{!! Form::open(['method'=>'post', 'action'=>'AdminMadiasController@store','class'=>'dropzone', 'files'=> true]) !!}

    {!! Form::close() !!} 
     
 
@endsection


@section('scripts')

<script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js'></script>

@endsection