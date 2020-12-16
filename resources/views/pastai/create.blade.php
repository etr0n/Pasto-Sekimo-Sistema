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
                    <div class="card-header">Pašto skyriaus duomenys</div>
                    <div class="card-body">
                       
                        <form action="{{route('pastai.store')}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="pavadinimas" class="col-md-2 col-form-label text-md-right">Pavadinimas*</label>

                                <div class="col-md-6">
                                    <input id="pavadinimas" type="text" class="form-control" name="pavadinimas" value="{{ old('pavadinimas') }}">
                                       @if ($errors->has('pavadinimas'))
                                         <span class="errormsg">{{ $errors->first('pavadinimas') }}</span>
                                       @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="adresas" class="col-md-2 col-form-label text-md-right">Adresas*</label>

                                <div class="col-md-6">
                                    <input id="adresas" type="text" class="form-control" name="adresas" value="{{ old('adresas') }}">
                                      @if ($errors->has('adresas'))
                                         <span class="errormsg">{{ $errors->first('adresas') }}</span>
                                       @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="miestas" class="col-md-2 col-form-label text-md-right">Miestas*</label>

                                <div class="col-md-6">
                                    <input id="miestas" type="miestas" class="form-control" name="miestas" value="{{ old('miestas') }}" >
                                    @if ($errors->has('miestas'))
                                         <span class="errormsg">{{ $errors->first('miestas') }}</span>
                                       @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="e_pastas" class="col-md-2 col-form-label text-md-right">El. paštas*</label>

                                <div class="col-md-6">
                                    <input id="el_paštas" type="text" class="form-control" name="el_paštas" value="{{ old('el_paštas') }}" >
                                    @if ($errors->has('el_paštas'))
                                         <span class="errormsg">{{ $errors->first('el_paštas') }}</span>
                                       @endif
                                </div>
                            </div>
                            <br>


                            <button type="submit" class="btn btn-dark float-right">
                                Registruoti pašto skyriu
                            </button>
                            <a class="btn btn-dark float-left" href="{{route('pastai.index')}}">Atgal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection