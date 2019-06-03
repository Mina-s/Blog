@extends('layouts.app')

@section('content')
{{$user->links()}}
<h2>Users</h2>

<table class="table table-bordered table-hover" >

<thead>
    <th>Username</th>
    <th>Name</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Birthdate</th>
    <tr>
    </tr>
</thead>

<tbody>
            
    @foreach($user as $user)
             <tr>
                <td> {{$user->username}} </td>
                <td> {{$user->name}}</a> </td>
                <td> {{$user->lastname}}</a> </td>
                <td>{{ $user->email}} </td>
                <td>{{ $user->birthdate}}</td>
            </tr>
    @endforeach
</tbody>

</table>



@endsection