@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Post
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
     {{$_SERVER['HTTP_REFERER']}}

            @if (auth()->check() && auth()->user()->id == $billet->user_id)
                <form method="post" action="{{ route('billet.update', $billet->id) }}">
                    @csrf
                    <div class="form-group">
                      <label for="title">title:</label>
                      <input type="text" class="form-control" name="title" value="{{ $billet->title }}" />
                    </div>
                    <div class="form-group">
                      <label for="content">content:</label>
                      <input type="text" class="form-control" name="content" value="{{ $billet->content }}" />
                    </div>
                    <div class="form-group">
                      <label for="price">Tags:</label>
                  
                      <input type="text" class="form-control" name="tags" value="@foreach($billet->tags as $tag) {{$tag->slug}} @endforeach" />
                  
                    </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                      <a href="{{route('billet.mesbillet', $billet->user_id)}}" class="btn btn-outline-secondary">Retour</a>
                </form>
            @else
            <div class="alert alert-warning" role="alert">
                Permission denied ! 
            </div>
            @endif
 
    </div>
</div>
@endsection