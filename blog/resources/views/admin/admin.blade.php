@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in admin!
                    <h2>Les 10 derniers utilisateurs inscrits</h2>
                    <table class="table table-bordered table-hover" >

                        <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <tr>
                            </tr>
                        </thead>

                        <tbody>
                                    
                            @foreach($user as $user)
                                     <tr>
                                        <td> {{$user->username}}</a> </td>
                                        <td>{{ $user->email}} </td>
                                        <td>{{ $user->birthdate}}</td>
                                    </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <h2>Les 10 derniers billets publiés.</h2>
                    <table class="table table-bordered table-hover" >
                        <thead>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Publié par </th>
                            <tr>
                            </tr>
                        </thead>

                        <tbody>
                                    
                            @foreach($billet as $billet)
                                    <tr>
                                        <td> {{$billet->title}}</a> </td>
                                        <td>{{ $billet->content}} </td>
                                        <td>{{ $billet->user->name}}</td>
                                    </tr>
                            @endforeach
                        </tbody>

                        </table>
                    <h2>Les 10 derniers commentaires laissés</h2>
                    <table class="table table-bordered table-hover" >

                        <thead>
                            <th>Titre du post commenté</th>
                            <th>Content</th>
                            <th>Commenté par </th>
                            <tr>
                            </tr>
                        </thead>

                        <tbody>
                                    
                            @foreach($comment as $comment)
                                    <tr>
                                        <td> {{$comment->post->title}}</a> </td>
                                        <td>{{ $comment->content}} </td>
                                        <td>{{ $comment->user->name}}</td>
                                    </tr>
                            @endforeach
                        </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
