@extends('layouts.admin')

@section('content')

    @if (Session::has('deleted_user'))
    <p class="bg-danger"> {{session('deleted_user')}}</p>
    @endif
    
    <h3>Users</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    
                </tr>
            </thead>
        <tbody>
        @if ($users)
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('edit', [ $user->id])}}">{{$user->name}}</a></td>
           <!--     <td>{{$user->photo ? $user->photo->path : 'No Photo'}}</td>-->
                <td><img height="50" src="/images/{{$user->photo ? $user->photo->path : '/images/noimage.jpg'}}" ></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role ? $user->role->name : 'No Role' }}</td>
                <td> {{$user->is_active == 0? 'Not active': 'Active'}} </td>
           <!--     <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td> -->
                <td>{{$user->created_at }}</td>
                <td>{{$user->updated_at }}</td>
           </tr>
            @endforeach
        @endif
        
        </tbody>
</table>
@endsection
