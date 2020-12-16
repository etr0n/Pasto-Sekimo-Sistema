@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                        </div>
                    @endif
                </div>
             
               <div class="card">
                  
                   <div class="card-body b4-alig">
                       <h4 class="card-title"><h2>Sveiki, {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h2> </h4>
                       <p class="card-text">Pasirinkite norimas funkcijas:</p>
                   </div>
                  
                   <ul class="list-group list-group-flush">
                      @can('kliento-nustatymai')
                      <li class="list-group-item">
                         <a class="dropdown-item" href="{{route('siuntos.viewkliento')}}" >Sekti siuntas</a>
                      </li>
                      @endcan

                      @can('operatoriaus-nustatymai')
                       <li class="list-group-item">
                          <a class="dropdown-item" href="{{route('siuntos.index')}}" >Registruoti siuntas</a>
                       </li>
                      @endcan

                      @can('vartotoju-nustatymai')
                       <li class="list-group-item">
                         <a class="dropdown-item" href="{{route('admin.users.index')}}" >Vartotojų nustatymai</a>
                         <a class="dropdown-item" href="{{route('pastai.index')}}" >Pašto skyriai</a>
                         <!-- pridet gate ar smth kad negaletu editinti -->
                         <a class="dropdown-item" href="{{route('siuntos.index')}}" >Stebėti siuntas</a>
                      @endcan
                       </li>
                   </ul>
               </div>   
        </div>
    </div>
</div>
@endsection
