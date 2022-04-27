@extends('templates.template')

@section('content')

    <main role="main" class="container">
      <h1 class="text-center mt-5">Visualizar</h1>
      <p class="lead">
        @php
            $type=$market->find($market->id)->relTypes;
        @endphp
        <div class="table-responsive">
            <table class="table text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Tipo</td>
                        <td>Quantidade Adquirida</td>
                        <td>Preço por unidade (R$)</td>
                        <td>Porcentagem cobrada</td>
                        <td>Imagem do produto</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$market->id}}</td>
                        <td>{{$market->name}}</td>
                        <td>{{$type->name}}</td>
                        <td>{{$market->quant}} Uni</td>
                        <td>{{number_format($market->price,2,",",".");}}</td>
                        <td>{{$market->percentage}}%</td>
                        <td><image src="{{asset('/storage/img/market/'.$market->image)}}" onerror="this.src='{{url('assets/img/null.png')}}'" alt="{{$market->name}}" width="100%" height="100"></td>
                    </tr>
                </tbody>
            </table>
            <table class="table text-center mt-5">
                <thead class="table-dark">
                    <tr>
                        <td>Valor pago por unidade com Imposto (R$)</td>
                        <td>Quantidade * Valor com imposto (R$)</td>
                        <td>Valor pago total sem imposto (R$)</td>
                        <td>Valor total pago de imposto (R$)</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        @php
                            $price=$market->price;
                            $percentage=$market->percentage;
                            $total_per_unidade=$price+($price*($percentage/100));
                            echo number_format($total_per_unidade,2,",",".");
                        @endphp
                        </td>
                        <td>
                        @php
                            $quant=$market->quant;
                            $total= $total_per_unidade * $quant;
                            echo number_format($total,2,",",".");
                        @endphp    
                        </td>
                        <td>
                        @php
                            $total_without= $price * $quant;
                            echo number_format($total_without,2,",",".");
                        @endphp   
                        </td>
                        <td>
                        @php
                            $total_percentage=$total - $total_without;
                            echo number_format($total_percentage,2,",",".");
                        @endphp 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
        
@endsection