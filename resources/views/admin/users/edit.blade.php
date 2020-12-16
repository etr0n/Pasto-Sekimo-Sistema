@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Redaguoti vartotoją:  {{$user->name}} {{$user->last_name}}</div>
               
                <div class="card-body " >
                    <form action="{{ route ('admin.users.update', $user) }}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                       
                        <label for="roles">Pasirinkti rolę: </label>
                        @foreach($roles as $role)
                        <div class="form check">
                            <input type="radio" name="roles" value="{{$role->id}}"
                            @if ($user->role->id==$role->id) checked @endif>
                            <label>{{$role->name}}</label>
                        </div>
                        @endforeach
                      
                        <button type="submit" class="btn btn-dark  float-right">Atnaujinti</button>
                        <a href="{{route('admin.users.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                      
                    </form>
                    
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
