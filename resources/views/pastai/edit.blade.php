@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Alert message (start) -->
     @if(Session::has('message'))
     <div class="alert {{ Session::get('alert-class') }}">
        {{ Session::get('message') }}
     </div>
     @endif
     <!-- Alert message (end) -->
            <div class="card">
                <div class="card-header">Redaguoti pašto skyriu:  {{$pastai->pavadinimas}}</div>
               
                <div class="card-body card text-center">
                    <form action="{{ route ('pastai.update', $pastai) }}" method="POST">
                        <div class="form-group row">
                           <label for="pavadinimas" class="col-md-4 col-form-label text-md-right">Pavadinimas</label>
                            <div class="col-md-5">
                                <input id="pavadinimas" type="text"  name="pavadinimas" value="{{ $pastai->pavadinimas }}" >
                                @if ($errors->has('pavadinimas'))
                                         <span class="errormsg">{{ $errors->first('pavadinimas') }}</span>
                                @endif
                            </div>
                       </div>
                        <div class="form-group row">
                           <label for="adresas" class="col-md-4 col-form-label text-md-right">Adresas</label>
                            <div class="col-md-5">
                                <input id="adresas" type="text"  name="adresas" value="{{ $pastai->adresas }}" >
                                @if ($errors->has('adresas'))
                                         <span class="errormsg">{{ $errors->first('adresas') }}</span>
                                @endif
                            </div>
                       </div>
                       <div class="form-group row">
                           <label for="miestas" class="col-md-4 col-form-label text-md-right">Miestas</label>
                            <div class="col-md-5">
                                <input id="miestas" type="text"  name="miestas" value="{{ $pastai->miestas }}" >
                                @if ($errors->has('miestas'))
                                         <span class="errormsg">{{ $errors->first('miestas') }}</span>
                                @endif
                            </div>

                       </div>
                       <div class="form-group row">
                           <label for="el_paštas" class="col-md-4 col-form-label text-md-right">El. paštas</label>
                            <div class="col-md-5">
                                <input id="el_paštas" type="text"  name="el_paštas" value="{{ $pastai->el_paštas }}" >
                                @if ($errors->has('el_paštas'))
                                         <span class="errormsg">{{ $errors->first('el_paštas') }}</span>
                                @endif
                            </div>
                       </div> 
                        @csrf
                        {{method_field('PUT')}}                      
                        <button type="submit" class="btn btn-dark  float-right">Atnaujinti</button>
                        <a href="{{route('pastai.index')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>
                      
                    </form>
                    
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
