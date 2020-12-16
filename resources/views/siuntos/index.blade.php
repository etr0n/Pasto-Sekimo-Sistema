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
                <div class="card-header">Registruotos siuntos</div>
                @if($siuntos->count()!=0)
                <div class="card-body">

                  <table class="table">
                  <thead>
                 <tr>
                     <th scope="col">Nr.</th>
                     <th scope="col">Siuntėjo vardas, pavardė</th>
                     <th scope="col">Siuntėjo adresas</th>
                     <th scope="col">Gavėjo vardas, pavardė</th>
                     <th scope="col">Gavėjo adresas</th>
                     <th scope="col">Būsena</th>
                     <th scope="col">Veiksmai</th>
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
                        
                         @can('operatoriaus-nustatymai')
                         <a href="{{route('siuntos.edit', $siunta)}}">
                        <!-- <button type="button" class="btn btn-dark float-left">Redaguoti</button></a> -->
                        <button type="button" title="Atnaujinti" style="border: none; background-color:transparent;">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                        @endcan

                        @can('operatoriaus-nustatymai')
                         <form action="{{route('siuntos.destroy', $siunta->id)}}" method="POST" class="float-right">
                            @csrf
                            {{method_field('DELETE')}}
                           <!--  <button type="submit" class="btn btn-danger ">Šalinti</button></a> -->
                            <button type="submit" title="Šalinti" style="border: none; background-color:transparent;">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                         </form> 
                         @endcan

                         <form action="{{route('siuntos.show', $siunta->id)}}" method="GET" class="float-right">
                            @csrf
                            {{method_field('GET')}}
                            <button type="submit" title="Detaliau" style="border: none; background-color:transparent;">
                              <i class="fa fa-list" aria-hidden="true"></i>
                            </button>
                         </form> 
                     </div>
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

                @can('operatoriaus-nustatymai')
                <a href="{{route('siuntos.create')}}"> <button type="button" class="btn btn-dark float-right">Registruoti</button> </a>
                @endcan
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
