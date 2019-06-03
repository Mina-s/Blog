@extends('layouts.app')


@section('content')
{{$billet->links()}}

        <br>
        <br>
        <br>
    <h1>Posts</h1>

    <div class="row">

             <!-- @foreach($billet as $billet)  -->
             <div class="col-md-6">
             <br>
             <br>

        
                 <div class="card">
                        <div class="card-header">
                            <h2> <a href="{{route('billet.show',['id'=> $billet->id])}}">{{$billet->title}}</a> </h2>
                            @foreach($billet->tags as $tag)
                                <a href="{{route('posts.tag', ['slug'=> $tag->slug])}}" class=" badge badge-dark">{{ $tag->slug }} </a>
                            @endforeach
                        </div>
                        <div class="card-body">
                            <p>Content : {{ $billet->content}}</p>
                            <p> Posté par : {{$billet->user->name}}</p>
                            <p> Posté le :{{$billet->created}}</p>
                            <h3><a href="{{route('billet.show',['id'=> $billet->id])}}">Commenter</a><br></h3>
                            <a href="{{route('billet.show',['id'=> $billet->id])}}">{{ count($billet->comments) }} Comment{{ count($billet->comments) > 1 ? 's' : '' }}</a>
                        </div>
                        
                </div>
            </div>        
               
               
             <!-- @endforeach  -->
</div>

           


  






@endsection