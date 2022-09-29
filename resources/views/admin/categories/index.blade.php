 @extends('layouts.app')

 @section('content')
     <header class="d-flex justify-content-between align-items-center">
        <h1>Lista categorie</h1>
        <a class="btn btn-success" href="{{route('admin.categories.create')}}">
            <i class="fa-solid fa-square-plus mr-2"></i>Crea nuova categoria
        </a>
    </header>
     <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Label</th>
            <th scope="col">Color</th>
            <th scope="col">Creato il</th>
            <th scope="col">Modificato il</th>
            <th scope="col">N° di post</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($categories  as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->label}}</td>
                <td><span class="badge badge-pill badge-{{$category->color}}">{{$category->color}}</span></td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>{{count($category->posts)}}</td>
                <td class="d-flex justify-content-end">
                    <a class="btn btn-sm btn-primary ml-2" href="{{route('admin.categories.show', $category)}}"><i class="fa-solid fa-eye mr-2"></i>Vedi</a>
                    <a class="btn btn-sm btn-warning ml-2" href="{{route('admin.categories.edit', $category)}}"><i class="fa-solid fa-pencil mr-2"></i>Modifica</a>
                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger ml-2" type="submit"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
                    </form>
                </td>
              </tr> 
            @empty
                <tr>
                    <td colspan="7">
                        <h3 class="text-center">Nessuna categoia</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
      </table>

      <nav class="mt-3">
        @if ($categories->hasPages())
            {{$categories->links()}}
        @endif
      </nav>
 @endsection