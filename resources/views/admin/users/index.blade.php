@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
      <!-- Alert message (start) -->
      @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }}">
         {{ Session::get('message') }}
      </div>
      @endif
      <!-- Alert message (end) -->
            <div class="card">
                <div class="card-header">Sistemos vartotojai</div>

                <div class="card-body">

                  <table class="table">
                  <thead>
                 <tr>
                     <th scope="col">Nr.</th>
                     <th scope="col">Vardas</th>
                     <th scope="col">El. paštas</th>
                     <th scope="col">Rolė</th>
                     <th scope="col">Redagavimas</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                <th scope="row">{{$user->id}}</th>
                     <td >{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->role->name}}</td>
                     <td>
                         <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-dark float-left">Redaguoti</button></a>
                       
                        
                         <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-right">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Šalinti</button></a>
                         </form> 
                     </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <a href="{{route('home')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
