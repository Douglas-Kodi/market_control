@extends('templates.template')

@section('content')

    <div class="container marketing">
    @csrf
    <h1 class="text-center mt-2">Loja</h1>
        <div class="row">
        @foreach($market as $markets)
        @php
            $type=$markets->find($markets->id)->relTypes;
        @endphp
        
          <div class="col-lg-4">
            <h2>{{$markets->name}}</h2>
            <h8>(Apenas {{$markets->quant}} disponivel)</h8> 
            <image src="{{asset('/storage/img/market/'.$markets->image)}}" onerror="this.src='{{url('assets/img/null.png')}}'" alt="{{$markets->name}}" width="100%" height="200">
            <p>{{$type->name}}</p>
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel mollitia dolorum cumque non ab odit neque ut modi eum, nisi explicabo tempora ullam, debitis a exercitationem consectetur fugiat quisquam nobis!</p>
            <h5>R$ {{number_format($markets->total,2,",",".");}}</h3>
            <p><a class="btn btn-success" href="{{url("home/$markets->id/edit")}}" role="button">Adicionar ao Carrinho &raquo;</a></p>
          </div>
        @endforeach
        </div>
        <div class="cent mt-5">{{$market->links()}}</div>
    </div>
@endsection