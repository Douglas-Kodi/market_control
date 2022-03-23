@extends('templates.template')

@section('content')

    <main role="main" class="container">
      <h1 class="text-center mt-5">Visualizar</h1>
      <p class="lead">
        @php
            $user=$sale->find($sale->id)->relUser;
            $market=$sale->find($sale->id)->relMarkets;
        @endphp
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="table-dark">
                    <tr>
                        <td>ID</td>
                        <td>Nome do cliente</td>
                        <td>Produto</td>
                        <td>Quantidade</td>
                        <td>Valor pago (R$)</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$market->name}}</td>
                        <td>{{$sale->quant}} Uni</td>
                        <td>{{number_format($sale->price,2,",",".");}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection