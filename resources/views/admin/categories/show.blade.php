@extends('layouts.app')

@section('content')
    <header><h1>{{$category->label }}</h1></header>
    <div class="clearfix">
        <p>{{$category->color }}</p>
        <p>Creata il: {{$category->created_at}}</p>
        <p>Modificato il: {{$category->updated_at}}</p>
    </div>
    <footer class="d-flex align-items-center justify-content-between mt-2">
        <div>
            <a class="btn btn-secondary" href="{{route('admin.categories.index')}}">
                <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-end">
            <a class="btn btn-warning" href="{{route('admin.categories.edit', $category)}}">
                <i class="fa-solid fa-pencil mr-2"></i>Modifica
            </a>
            <form class="ml-2" action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
            </form>
        </div>
    </footer>
@endsection