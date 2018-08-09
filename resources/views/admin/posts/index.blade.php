@extends('layouts.admin')

@section('content')

    <h3>Posts</h3>
    @if (Session::has('deleted_post'))
    <p class="bg-danger"> {{session('deleted_post')}}</p>
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
                    <th></th>
                    <th></th>
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
                <td><a href="{{route('postedit',$post->id)}}">{{$post->user->name}}</a></td>
            <!--    <td>{{$post->user->name}}</td> -->
                <td>{{$post->category ? $post->category->name : 'No category'}} </td>
                <td><a href="{{route('homepost',$post->id)}}">View Post</a></td>
                <td><a href="{{route('comments.show',$post->id)}}">View Comments</a></td>
                <td>{{$post->created_at }}</td>
                <td>{{$post->updated_at }}</td>
            </tr>
            @endforeach
        @endif
        
        </tbody>
        </table>
    <div class="row">
        <div class="col-sm-6 col-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection
