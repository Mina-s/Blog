@extends('layouts.app')


@section('content')

<br>
        <br>
        <br>
    <h1>Post</h1>
    <div class="row">


        <div class="col-md-8">
        <br>
        <br>
        <br>
        <div class="card">
                <div class="card-header">
                    <h1><a href="{{route('billet.show',['id'=> $billet->id])}}">{{$billet->title}}</a></h1>
                    @foreach($billet->tags as $tag)

                      <a href="{{route('posts.tag', ['slug'=> $tag->slug])}}" class=" badge badge-dark">{{ $tag->slug }} </a>
                    @endforeach
                 
                </div>
             <div class="card-body">
            
            <hr>
                <p class="lead"> {{$billet->content}} </p>
                <p class="lead">Posté par: {{$billet->user->name}}<p>
                <p>Posté :{{$billet->created}}</p> 

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Commenter le post!
                    </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <form action="{{route('comment.store',['id'=> $billet->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="content"><h3></h3></label>
                        <input type="text" name="content" class="form-control" value="{{old('content')}}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Ajouter un commentaire</button>
                    </div>
                 </form>
                 </div>

             </div>



            <h3>Commentaire</h3>
            @foreach($billet->comments as $comment)
            <div class="row">
                <div class="col-md-10">
                    <p><strong>{{ $comment->user->username}}</strong> {{ $comment->created->diffForHumans() }}</p>
                    <p>{{ $comment->content }}</p>
                </div>
            </div>
            <hr>
        @endforeach
            </div> 
           


          
        </div> 
       
 
     

     
  
    

        </div>
      



  
@endsection