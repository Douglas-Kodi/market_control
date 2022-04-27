@extends('templates.template')

@section('content')

    <div class="text-center mt-3 mb-4">
        <a href="{{url('markets/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        <div class="table-responsive">
            <table class="table text-center table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Porcentual</th>
                        <th scope="col" colspan="3">Opções</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($market as $markets)
                    @php
                        $type=$markets->find($markets->id)->relTypes;
                    @endphp
                    <tr>
                        <th scope="row">{{$markets->id}}</th>
                        <th scope="row">{{$markets->name}}</th>
                        <th scope="row">{{$type->name}}</th>
                        <th scope="row">{{number_format($markets->price,2,",",".");}}</th>
                        <th scope="row">{{$markets->percentage}}%</th>
                        <th scope="row">
                            <a href="{{url("markets/$markets->id")}}">
                                <button class="btn btn-dark">Ver mais</button>
                            </a>
                        </th>
                        <th scope="row">
                            <a href="{{url("markets/$markets->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                        </th>
                        <th scope="row">
                            <a href="{{url("markets/$markets->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </th>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            
        </div>
        {{$market->links()}}
    </div>
@endsection