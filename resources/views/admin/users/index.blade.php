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
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Nome</th>
              <th scope="col">Età</th>
              <th scope="col">Indirizzo</th>
              <th scope="col">Telefono</th>
              <th scope="col">N° di post</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="col">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->userDetail->first_name}} {{$user->userDetail->last_name}}</td>
                    <td>{{$user->userDetail->getAge()}}</td>
                    <td>{{$user->userDetail->address}}</td>
                    <td>{{$user->userDetail->phone}}</td> 
                    <td>{{count($user->posts)}}</td> 
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        <h3>Nessun utente</h3>
                    </td>
                </tr>
            @endforelse
          </tbody>
    </table>
@endsection