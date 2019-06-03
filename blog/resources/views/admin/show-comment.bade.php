@extends('layouts.app')

@section('content')
{{$comment->links()}}

<h2>comments publiés.</h2>
    <table class="table table-bordered table-hover" >
         <thead>
                <th>Title du post commenté</th>
                <th>Content</th>
                <th>Publié par </th>
                <th>Publié le </th>
                <tr>
                </tr>
         </thead>

         <tbody>
                                    
                @foreach($comment as $comment)
                        <tr>
                                <td> {{$comment->post->name}}</a> </td>
                                <td>{{ $comment->content}} </td>
                                <td>{{ $comment->user->name}}</td>
                                <td>{{ $comment->created}}</td>
                        </tr>
                @endforeach
         </tbody>

    </table>



@endsection