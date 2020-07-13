@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <h1 class="text-center">Lista de Artículos</h1>
                @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-header">
                         <p class="text-center"> <b>{{$post->name}}</b> </p>
                        </div>
                        <div class="card-body">
                        @if ($post->file)
                            <img class="img-fluid" src="{{$post->file}}" alt="Imagen del Post">
                        @endif
                        <p class="text-center">
                            {{$post->excerpt}}
                            <br>
                            <br>
                            <a href="#" class="btn btn-primary">Leer Más</a>
                        </p>
                        </div>
                    </div>
                    <br>
                @endforeach
                {{$posts->render()}}
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

@endsection
