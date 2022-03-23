@extends('templates.template')

@section('content')

    <h1 class="text-center mt-5">@if(isset($sale))Editar @else Cadastrar @endif</h1>
    
    <div class="col-8 m-auto mt-5">
        
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($sale))
            <form name="formEdit" id="formEdit" method="post" action="{{url("sales/$sale->id")}}">
                @method('PUT')
        @else 
            <form name="formCad" id="formCad" method="post" action="{{url('sales')}}">
        @endif
            @csrf
            <label for="id_user">Nome do produto:</label>
            <input class="form-control" type="text" name="" id="" placeholder="" value="{{$sale->relUser->name ?? Auth::user()->name}}" disabled><br>
            <input class="form-control" type="text" name="id_user" id="id_user" placeholder="" value="{{$sale->id_user ?? Auth::user()->id}}" hidden>
            <label for="id_market">Selecione o tipo do produto:</label>
            <select class="form-control" name="id_market" id="id_market" required>
                <option value="{{$sale->relMarkets->id ?? $market->id}}">{{$sale->relMarkets->name ?? $market->name}} - 
                    (Apenas {{$sale->relMarkets->quant ?? $market->quant}} disponivel) - 
                    Valor (R$): {{$sale->relMarkets->total ?? number_format($market->total,2,",",".")}}</option>
                    
                @foreach($markets as $market)
                    <option value="{{$market->id}}">{{$market->name}} - (Apenas {{$market->quant}} disponivel) - Valor (R$): {{number_format($market->total,2,",",".")}}</option>
                @endforeach
            </select><br>
            <label for="quant">Quantidade do produto:</label>
            <input class="form-control" type="text" name="quant" id="quant" placeholder="" value="{{$sale->quant ?? ''}}" required><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($sale))Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection