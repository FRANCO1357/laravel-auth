@extends('layouts.app')

@section('content')
<div class="container">
    <header><h1>{{$post->title }}</h1></header>
    <div class="clearfix">
        @if ($post->image)
        <img class="float-left mr-2" src="{{$post->image}}" alt="{{$post->slug}}">
        @endif
        <p>{{$post->content}}</p>
        <p>Creato il: {{$post->created_at}}</p>
        <p>Modificato il: {{$post->updated_at}}</p>
    </div>
    <footer class="d-flex align-items-center justify-content-end">
        <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">
            <i class="fa-solid fa-rotate-left"></i>Indietro
        </a>
    </footer>
@endsection