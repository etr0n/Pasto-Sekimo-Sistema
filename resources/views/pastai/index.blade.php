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
                <div class="card-header">Pašto skyriai</div>

                @if($pastai->count()!=0)
               <div class="card-body">

                  <table class="table">
                  <thead>
                 <tr>
                     <th scope="col">Nr.</th>
                     <th scope="col">Pavadinimas</th>
                     <th scope="col">Adresas</th>
                     <th scope="col">Miestas</th>
                     <th scope="col">El. paštas</th>
                     <th scope="col">Veiksmai</th>
                </tr>
                </thead>
                <tbody>
           
                @foreach($pastai as $pastas)
                <tr>
                <th scope="row">{{$pastas->id}}</th>
                     <td >{{$pastas->pavadinimas}}</td>
                     <td>{{$pastas->adresas}}</td>
                     <td>{{$pastas->miestas}}</td>
                     <td>{{$pastas->el_paštas}}</td>
                     
                     <td>
                         <a href="{{route('pastai.edit', $pastas->id)}}"><button type="button" class="btn btn-dark float-left">Redaguoti</button></a>
                       
                        
                         <form action="{{route('pastai.destroy', $pastas->id)}}" method="POST" class="float-right">
                        
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Šalinti</button></a>
                         </form> 

                     </td>
                </tr>
                @endforeach
                @else
                <div class="alert alert-light" role="alert">
                <strong>Atsiprašome, bet šiuo metu nėra registruotų pašto skyriu.</strong>
                </div>
                @endif
                </tbody>
                </table>
                
                <div>
                <a href="{{route('home')}}"> <button type="button" class="btn btn-dark float-left">Atgal</button> </a>
                <a href="{{route('pastai.create')}}"> <button type="button" class="btn btn-dark float-right">Registruoti</button> </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
