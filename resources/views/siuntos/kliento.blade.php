@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
             <!-- Alert message (start) -->
      @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }}">
         {{ Session::get('message') }}
      </div>
      @endif
      <!-- Alert message (end) -->
            <div class="card">
                <div class="card-header"> Vartotojo {{ Auth::user()->name }} {{ Auth::user()->last_name }} siuntos</div>
                @if($siuntos->count()!=0)
                <div class="card-body">

                  <table class="table">
                  <thead>
                 <tr>
                     <th scope="col">Nr.</th>
                     <th scope="col">Siuntėjo vardas, pavardė</th>
                     <th scope="col"style="width: 18%">Siuntėjo adresas</th>
                     <th scope="col">Gavėjo vardas, pavardė</th>
                     <th scope="col" style="width: 18%" >Gavėjo adresas</th>
                     <th scope="col">Būsena</th>
                 
                </tr>
                </thead>
                <tbody>
                @foreach($siuntos as $siunta)
                <tr>
                <th scope="row">{{$siunta->id}}</th>
                    <td >{{$siunta->user->name}} {{$siunta->user->last_name}}</td>
                     <td >{{$siunta->siuntejo_adresas}}</td>
                     <td>{{$siunta->gavejo_vardas}} {{$siunta->gavejo_pavarde}}</td>
                     <td>{{$siunta->gavejo_adresas}}</td>
                     <td>{{$siunta->busena->pavadinimas}}</td>
                     <td>
                     <div style="text-align: center"> 
                      

                    </td>
                </tr>
                @endforeach
                @else
                <div class="alert alert-light" role="alert">
                    <strong>
                        Šiuo metu duomenų nėra.
                    </strong>
                </div>
                @endif
                </tbody>
                </table>
                    <div>
                      <a href="{{route('home')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
