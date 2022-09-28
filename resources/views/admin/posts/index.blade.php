 @extends('layouts.app')

 @section('content')
     <header class="d-flex justify-content-between align-items-center">
        <h1>Lista posts</h1>
        <a class="btn btn-success" href="{{route('admin.posts.create')}}">
            <i class="fa-solid fa-square-plus mr-2"></i>Crea nuovo post
        </a>
    </header>
     <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
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
                <td>@if($post->category) <span class="badge badge-pill badge-{{$post->category->color}}">{{$post->category->label}}</span>  @else Nessuna @endif</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-sm btn-primary ml-2" href="{{route('admin.posts.show', $post)}}"><i class="fa-solid fa-eye mr-2"></i>Vedi</a>
                    <a class="btn btn-sm btn-warning ml-2" href="{{route('admin.posts.edit', $post)}}"><i class="fa-solid fa-pencil mr-2"></i>Modifica</a>
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger ml-2" type="submit"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
                    </form>
                </td>
              </tr> 
            @empty
                <tr>
                    <td colspan="7">
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
 @endsection