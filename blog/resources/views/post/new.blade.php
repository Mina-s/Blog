@extends('layouts.app')


@section('content')

    <form action="{{route('billet.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}">
        </div>

    
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" class="form-control" value="{{old('tags')}}">
        </div>

        <div class="form-group">
            <label for="title">Contenu</label>
            <textarea name="content" row="10" class="form-control">{{old('content')}}</textarea>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Ajouter un billet</button>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
    </form>


@endsection