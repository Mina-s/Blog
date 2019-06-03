@extends('layouts.app')


@section('content')

<br>
        <br>
        <br>
    <h1>Posts</h1>
    <div class="row">

        @foreach ($billet as $billet)

        <div class="col-md-12">
        <br>
        <br>
        <br>
            <div class="card">
                <div class="card-header">
                    <a href="{{route('billet.show',['id'=> $billet->id])}}">{{$billet->title}}</a>
                 
                </div>
             </div class="card-body">
                                 
            
            <hr>
            
                <p class="lead"> {{$billet->content}} </p>
                <p class="lead">Vendeur :{{$billet->user->name}}<p>
                <p>Posté :{{$billet->created}}</p>

              
            </div> 
            
            @endforeach 
        </div>
       
       

       
    </div>
  






@endsection