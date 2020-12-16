@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Naujos siuntos registravimas</div>
                    <div class="card-body">
                        
                    <form action="{{route('siuntos.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">Siuntėjo vardas, pavardė</label>
                            <div class="col-md-4">
                            <select name="user" id="user">
                                        @foreach($users as $user)
                                      
                                                <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}} </option>
                                       
                                        @endforeach
                                    

                                    </select>
                            </div>
                            </div>
                               <div class="form-group row">
                                <label for="siuntejo_adresas" class="col-md-4 col-form-label text-md-right">Siuntėjo adresas</label>

                                <div class="col-md-4">
                                    <input id="siuntejo_adresas" type="text" class="form-control" name="siuntejo_adresas" value="{{ old('siuntejo_adresas') }}">
                                       @if ($errors->has('siuntejo_adresas'))
                                         <span class="errormsg">{{ $errors->first('siuntejo_adresas') }}</span>
                                       @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gavejo_vardas" class="col-md-4 col-form-label text-md-right">Gavėjo vardas</label>

                                <div class="col-md-4">
                                    <input id="gavejo_vardas" type="text" class="form-control" name="gavejo_vardas" value="{{ old('gavejo_vardas') }}">
                                    @if ($errors->has('gavejo_vardas'))
                                         <span class="errormsg">{{ $errors->first('gavejo_vardas') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gavejo_pavarde" class="col-md-4 col-form-label text-md-right">Gavėjo pavardė</label>

                                <div class="col-md-4">
                                    <input id="gavejo_pavarde" type="gavejo_pavarde" class="form-control" name="gavejo_pavarde" value="{{ old('gavejo_pavarde') }}" >
                                    @if ($errors->has('gavejo_pavarde'))
                                         <span class="errormsg">{{ $errors->first('gavejo_pavarde') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gavejo_adresas" class="col-md-4 col-form-label text-md-right">Gavėjo adresas</label>

                                <div class="col-md-4">
                                    <input id="gavejo_adresas" type="gavejo_adresas" class="form-control" name="gavejo_adresas" value="{{ old('gavejo_adresas') }}" >
                                    @if ($errors->has('gavejo_adresas'))
                                         <span class="errormsg">{{ $errors->first('gavejo_adresas') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gavejo_epastas" class="col-md-4 col-form-label text-md-right">Gavėjo el. paštas</label>

                                <div class="col-md-4">
                                    <input id="gavejo_epastas" type="gavejo_epastas" class="form-control" name="gavejo_epastas" value="{{ old('gavejo_epastas') }}" >
                                    @if ($errors->has('gavejo_epastas'))
                                         <span class="errormsg">{{ $errors->first('gavejo_epastas') }}</span>
                                     @endif
                                </div>
                            </div>
                            <br>


                            <button type="submit" class="btn btn-dark float-right">
                                Registruoti siuntą
                            </button>
                            <a class="btn btn-dark float-left" href="{{route('siuntos.index')}}">Atgal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection