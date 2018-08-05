@extends('layouts.admin')

@section('content')

<h3> Media </h3>
@if (Session::has('deleted_media'))
    <p class="bg-danger"> {{session('deleted_media')}}</p>
@endif
    @if ($photos)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{'/images/'.$photo->path}}" height="50"></td>
                
                    <td>{{$photo->created_at ? $photo->created_at : "No Date"}}</td>
                    <td>{{$photo->updated_at ?  $photo->updated_at : "No Date"}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE',  'action'=>['AdminMadiasController@destroy',$photo->id], 'files'=> true]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete Media',['class'=>'btn btn-danger col-sm-8']) !!}
                            </div>
                        {!! Form::close() !!}                        
                        
                    </td>
                </tr>
                @endforeach
     
            </tbody>
        </table>
    @endif
 
    <div class="row">
        @include('includes/form_error')  
    </div>
@endsection



