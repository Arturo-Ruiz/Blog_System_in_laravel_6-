@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <h1 class="text-center">{{$post->name}}</h1>
                    <div class="card">
                        <div class="card-header">
                         <p class="text-center">Categoria:
                         <a href="{{route('category', $post->category->slug)}}">{{$post->category->name}}</a>
                        </p>
                        </div>
                        <div class="card-body">
                        @if ($post->file)
                            <img class="img-fluid" src="{{$post->file}}" alt="Imagen del Post">
                        @endif
                        <p class="text-center">
                            <br>
                            {{$post->excerpt}}
                            <br>
                            <br>
                            <hr>
                            {!! $post->body !!}
                            <hr>
                        </p>
                        <p class="text-center">
                            Etiquetas
                            @foreach ($post->tags as $tag)
                            <a href="{{route('tag', $tag->slug)}}">{{$tag->name}}</a>
                            @endforeach
                        </p>
                        </div>
                    </div>
                    <br>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

@endsection
