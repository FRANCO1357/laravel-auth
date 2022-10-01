 @extends('layouts.app')

 @section('content')
     <header class="d-flex justify-content-between align-items-center">
        <h1>Lista posts</h1>
        <div class="d-flex align-items-center">
            <form action="" method="">
                @csrf
                <div class="input-group">
                    <select class="custom-select" name="category_id">
                    <option value="">Tutte le categorie</option>
                    @foreach ($categories as $category)
                        <option @if ($category->id == $selected_category) selected @endif value="{{$category->id}}">{{$category->label}}</option>
                    @endforeach
                    </select>
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Filtra</button>
                    </div>
                </div>
            </form>

        <a class="btn btn-success ml-2" href="{{route('admin.posts.create')}}">
            <i class="fa-solid fa-square-plus"></i>
        </a>
        </div>
    </header>
     <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Autore</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Slug</th>
            <th scope="col">Creato il</th>
            <th scope="col">Modificato il</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($posts  as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td> 
                @if ($post->user)
                {{$post->user->name}}
                @else
                    Anonimo
                @endif
                </td>
                <td>@if($post->category) <span class="badge badge-pill badge-{{$post->category->color}}">{{$post->category->label}}</span>  @else Nessuna @endif</td>
                <td>
                @forelse ($post->tags as $tag)
                    <span class="badge badge-pill text-white" style="background-color: {{$tag->color}}">{{$tag->label}}</span>
                @empty
                    -
                @endforelse</p>
                </td>
                <td>{{$post->slug}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-sm btn-primary ml-2" href="{{route('admin.posts.show', $post)}}"><i class="fa-solid fa-eye mr-2"></i>Vedi</a>
                    @if($post->user_id === Auth::id())
                    <a class="btn btn-sm btn-warning ml-2" href="{{route('admin.posts.edit', $post)}}"><i class="fa-solid fa-pencil mr-2"></i>Modifica</a>
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger ml-2" type="submit"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
                    </form>
                    @endif
                </td>
              </tr> 
            @empty
                <tr>
                    <td colspan="9">
                        <h3 class="text-center">Nessun post</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
      </table>

      <nav class="mt-3">
        @if ($posts->hasPages())
            {{$posts->links()}}
        @endif
      </nav>

      <section class="my-5" id="category-post">
        <h2>Post by category</h2>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-5">
                    <h4>{{$category->label}} ({{count($category->posts)}})</h4>
                    @forelse ($category->posts as $post)
                        <p><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></p>
                    @empty
                        Nessun post
                    @endforelse
                </div>
            @endforeach
        </div>
      </section>
 @endsection