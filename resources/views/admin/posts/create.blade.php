@extends('layouts.app')

@section('content')
    <header>
        <h1>Crea post</h1>
    </header>
    <hr>
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="title">Titolo </label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required minlength="5" maxlength="50">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="image">Immagine</label>
                    <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
                </div>
            </div>
            <div class="col-11">
                <div class="form-group">
                    <label for="image">Immagine</label>
                    <input type="url" class="form-control" id="image" name="image" value="{{old('image')}}">
                </div>
            </div>
            <div class="col-1">
                <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png " alt="" id="preview">
            </div>
        </div>
    <hr>
    <footer class="d-flex justify-content-between">
        <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">
            <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
        </a>
        <button class="btn btn-success" type="submit">
            <i class="fa-solid fa-floppy-disk mr-2"></i>Salva
        </button>
    </footer>
    </form> 
@endsection