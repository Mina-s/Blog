@extends('layouts.app')
@section('title','Mes Posts')
    

@section('content')
        <br>
        <br>
        <br>
    <h1> Mes posts</h1>
   
    @if (auth()->check() && auth()->user()->id == $user->id )
    <h2> {{$user->name}}</h2>

        <div class="row">           <p>Posté :{{$post->created}}</p>
                                    <hr>
                              
            @foreach ($user->posts as $post)
                    
                    <div class="col-md-6">
                    <br>
                    <br>
                    <br>
                            <div class="card">
                                <div class="card-header">
                                    <h3><a href="{{route('billet.show',['id'=> $post->id])}}">{{$post->title}}</a></h3>
                                    @foreach($post->tags as $tag)
                                        <a href="{{route('posts.tag', ['slug'=> $tag->slug])}}" class=" badge badge-dark">{{ $tag->slug }} </a>
                                    @endforeach
                                
                                </div>
                                <div class="card-body">
                                    <p class="lead"> {{$post->content}} </p>
                                    <p class="lead">Vendeur :{{$post->user->name}}<p>
                                    <p>Posté :{{$post->created}}</p>
                                    <hr>
                                    <a href="{{route('billet.edit',['id'=> $post->id])}}" class="btn btn-outline-info">Modifier</a> 
                                    <a href="{{route('billet.list')}}" class="btn btn-outline-secondary">Retour</a>

                            
                                
                                    <form action="{{route('billet.destroy',['id'=> $post->id])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" >Supprimer</button>
                                    </form> 
                                
                                </div>
                                
                            </div> 
                            
                                {{$_SERVER['HTTP_REFERER']}}       
                    </div>

            @endforeach
            </div>
        @else
             <div class="alert alert-warning" role="alert">
                Permission denied ! 
            </div>
        @endif
   
       
@endsection