@extends('layouts.app')


@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalėsne infromacija apie siuntą </div>
                    <div class="card-body">
                <h2> Informacija apie siuntą, kurios ID: {{ $siunto-> id }} </h2>
             

                    <ul class="list-group list-group-flush">   
                        <li class="list-group-item">Data paimta: <span style="display:inline-block; width: 30px;"></span> {{$siunto->ivykiulaikas->data_paimta}}</li>
                        
                        @if($siunto->ivykiulaikas->data_siunciama!=null)
                        <li class="list-group-item">Data siunčiama: <span style="display:inline-block; width: 10px;"></span> {{$siunto->ivykiulaikas->data_siunciama}}</li>
                        @else
                        <li class="list-group-item">Data siunčiama: <span style="display:inline-block; width: 17px;"></span>-</li>
                        @endif

                        @if($siunto->ivykiulaikas->data_atsiimta!=null)
                        <li class="list-group-item">Data atsiimta: <span style="display:inline-block; width: 22px;"></span> {{$siunto->ivykiulaikas->data_atsiimta}}</li>
                        @else
                        <li class="list-group-item">Data atsiimta: <span style="display:inline-block; width: 29px;"></span>-</li>
                        @endif

                        @if($siunto->ivykiulaikas->data_ivykdyta!=null)
                        <li class="list-group-item">Data įvykdyta: <span style="display:inline-block; width: 20px;"></span> {{$siunto->ivykiulaikas->data_ivykdyta}}</li>
                        @else
                        <li class="list-group-item">Data įvykdyta: <span style="display:inline-block; width: 27px;"></span>-</li>
                        @endif

                        @if($siunto->ivykiulaikas->data_ivykdyta!=null)
                        <li class="list-group-item">Trukmė: <span style="display:inline-block; width: 59px;"></span>   {{$diff = Carbon\Carbon::parse($siunto->ivykiulaikas->data_paimta)->diffInDays(Carbon\Carbon::parse($siunto->ivykiulaikas->data_ivykdyta))}} dienos </li>
                        @else
                        <li class="list-group-item">Trukmė: <span style="display:inline-block; width: 69px;"></span>-</li>
                        @endif
                    </ul> 
                  
                    <br>
             
                    <div>
                        <a class="btn btn-dark" href="{{ route('siuntos.index') }}" title="Go back"> <i class="fa fa-arrow-left "></i> </a>
                   </div>
            </div> 
         </div>   
    </div>
</div>
@endsection