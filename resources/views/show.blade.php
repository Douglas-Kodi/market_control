@extends('templates.template')

@section('content')

    <div class="text-center mt-3 mb-4">
        <a href="#">
            <button class="btn btn-success">Finalizar Compra</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        <div class="table-responsive">
            <table class="table text-center table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col" colspan="3">Opções</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($sale as $sales)
                    @php
                        $market=$sales->find($sales->id)->relMarkets;
                    @endphp
                    <tr>
                        <th scope="row">{{$sales->id}}</th>
                        <th scope="row">{{$market->name}}</th>
                        <th scope="row">{{$sales->quant}}</th>
                        <th scope="row">{{$sales->price}}
                            @php
                                $quant = $sales->quant;
                                $price = $sales->price;
                                $a_price = $quant * $price;
                                $full_price = $full_price + $a_price;
                            @endphp
                        </th>
                        <th scope="row">
                            <a href="{{url("home/$sales->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </th>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            <table class="table text-center mt-5">
                <thead class="table-dark">
                    <tr>
                        <td>Valor total (R$)</td>
                        <td width="50%">
                            @php
                                echo number_format($full_price,2,",",".");
                            @endphp
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection