@extends('layouts.admin')

@section('content')

    <h3>Posts</h3>
    @if (Session::has('deleted_post'))
    <p class="bg-danger"> {{session('deleted_user')}}</p>
    @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    
                </tr>
            </thead>
        <tbody>
        @if ($posts)
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="#">{{$post->title}}</a></td>
                <td>{{$post->body}}></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'No category'}} </td>
                <td><img height="50" src="/images/{{$post->photo ? $post->photo->path : '/images/noimage.jpg'}}" ></td>
            <!--    <td>{{$post->photo_id}}</td> -->
                <td>{{$post->created_at }}</td>
                <td>{{$post->updated_at }}</td>
            </tr>
            @endforeach
        @endif
        
        </tbody>
        </table>
@endsection
