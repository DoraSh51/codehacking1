@extends('layouts.admin')

@section('content')
    <h3>Users</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
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
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td> {{$user->is_active == 0? 'Not active': 'Active'}}
                </td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
           </tr>
            @endforeach
        @endif
        
        </tbody>
</table>
@endsection
