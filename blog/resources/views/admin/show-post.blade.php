@extends('layouts.app')

@section('content')
{{$billet->links()}}

<h2>Billets publiés.</h2>
    <table class="table table-bordered table-hover" >
         <thead>
                <th>Title</th>
                <th>Content</th>
                <th>Publié par </th>
                <th>Publié le </th>
                <tr>
                </tr>
         </thead>

         <tbody>
                                    
                @foreach($billet as $billet)
                        <tr>
                                <td> {{$billet->title}}</a> </td>
                                <td>{{ $billet->content}} </td>
                                <td>{{ $billet->user->name}}</td>
                                <td>{{ $billet->created}}</td>
                        </tr>
                @endforeach
         </tbody>

    </table>



@endsection