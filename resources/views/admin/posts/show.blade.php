@extends('layouts.app')

@section('content')
    <header><h1>{{$post->title }}</h1></header>
    <div class="clearfix">
        @if ($post->image)
        <img class="float-left mr-2" src="{{$post->image}}" alt="{{$post->slug}}">
        @endif
        <p>{{$post->content}}</p>
        <p>Creato il: {{$post->created_at}}</p>
        <p>Modificato il: {{$post->updated_at}}</p>
    </div>
    <footer class="d-flex align-items-center justify-content-between mt-2">
        <div>
            <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">
                <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">
                <i class="fa-solid fa-pencil mr-2"></i>Modifica
            </a>
            <form class="ml-2" action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
            </form>
        </div>
    </footer>
@endsection