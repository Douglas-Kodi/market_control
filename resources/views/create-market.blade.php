@extends('templates.template')

@section('content')

    <h1 class="text-center mt-5">@if(isset($market))Editar @else Cadastrar @endif</h1>
    
    <div class="col-8 m-auto mt-5">
        
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($market))
            <form name="formEdit" id="formEdit" method="post" enctype="multipart/form-data" action="{{url("markets/$market->id")}}">
                @method('PUT')
        @else 
            <form name="formCad" id="formCad" method="post" enctype="multipart/form-data" action="{{url('markets')}}">
        @endif
            @csrf
            <label for="name">Nome do produto:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="" value="{{$market->name ?? ''}}" required><br>
            <label for="id_type">Selecione o tipo do produto:</label>
            <select class="form-control" name="id_type" id="id_type" required>
                <option value="{{$market->relTypes->id ?? ''}}">{{$market->relTypes->name ?? 'Null'}}</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select><br>
            <label for="quant">Quantidade do produto:</label>
            <input class="form-control" type="text" name="quant" id="quant" placeholder="" value="{{$market->quant ?? ''}}" required><br>
            <label for="price">Preço do produto:</label>
            <input class="form-control" type="text" name="price" id="price" placeholder="" value="{{$market->price ?? ''}}" required><br>
            <label for="percentage">Porcetagem de taxa do produto:</label>
            <input class="form-control" type="text" name="percentage" id="percentage" placeholder="" value="{{$market->percentage ?? ''}}" required><br>
            <div class="mb-3">
                <label for="image" class="form-label">Imagem do Produto: {{$market->image ?? 'Sem imagem cadastrada'}} (Apenas selecionar imagem caso desejar efetuar uma mudança na mesma)</label>
                <input class="form-control" name="image" type="file" id="image" value="{{$market->image ?? ''}}">
            </div>
            <input class="btn btn-primary" type="submit" value="@if(isset($market))Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection