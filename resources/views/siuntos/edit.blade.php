@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">Atnaujinti siuntos būseną</div>
                    <div class="card-body card text-center">

                    <form action="{{route('siuntos.update', $siunta)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <select name="busena" id="busena">
                                        @foreach($busenos as $busena)
                                            @if($siunta->busena_id===$busena->id)
                                                <option value="{{$busena->id}}" selected="selected">{{$busena->pavadinimas}} </option>
                                            @else
                                                <option value="{{$busena->id}}">{{$busena->pavadinimas}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                            <br><br>
                            <button type="submit" class="btn btn-dark float-right">
                                Atnaujinti
                            </button>
                            <a class="btn btn-dark float-left" href="{{route('siuntos.index')}}">Atgal</a>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection