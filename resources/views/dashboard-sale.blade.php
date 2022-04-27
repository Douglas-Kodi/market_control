@extends('templates.template')

@section('content')
    <!--
    <div class="text-center mt-3 mb-4">
        <a href="{{url('sales/create')}}">
            <button class="btn btn-success">Cadastrar-Compra</button>
        </a>
    </div>
    -->
    <h3 class="text-center mt-5">Vendas efetuadas</h3>
    <div class="col-8 m-auto">
        <div class="table-responsive">
            <table class="table text-center table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Comprador</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col" colspan="3">Opções</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sale as $sales)
                    @php
                        $user=$sales->find($sales->id)->relUser;
                        $market=$sales->find($sales->id)->relMarkets;
                    @endphp
                    <tr>
                        <th scope="row">{{$sales->id}}</th>
                        <th scope="row">{{$user->name}}</th>
                        <th scope="row">{{$market->name}}</th>
                        <th scope="row">{{$sales->quant}}</th>
                        <th scope="row">{{$sales->price}}</th>
                        <th scope="row">
                            <a href="{{url("sales/$sales->id")}}">
                                <button class="btn btn-dark">Ver mais</button>
                            </a>
                        </th>
                        <!--
                        <th scope="row">
                            <a href="{{url("sales/$sales->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                        </th>
                        -->
                        <th scope="row">
                            <a href="{{url("sales/$sales->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </th>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            
        </div>
        {{$sale->links()}}
    </div>
@endsection