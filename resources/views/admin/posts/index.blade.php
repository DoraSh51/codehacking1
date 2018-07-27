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
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    
                </tr>
            </thead>
        <tbody>
        @if ($posts)
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img height="50" src="/images/{{$post->photo ? $post->photo->path : '/images/noimage.jpg'}}" ></td>
                <td>{{$post->title}}</td>
                <td>{{str_limit($post->body,20)}}</td>
                <td><a href="{{route('postedit', [ $post->id])}}">{{$post->user->name}}</a></td>
            <!--    <td>{{$post->user->name}}</td> -->
                <td>{{$post->category ? $post->category->name : 'No category'}} </td>
            <!--    <td>{{$post->photo_id}}</td> -->
                <td>{{$post->created_at }}</td>
                <td>{{$post->updated_at }}</td>
            </tr>
            @endforeach
        @endif
        
        </tbody>
        </table>
@endsection
