@extends('templates.template')

@section('content')

    <div class="text-center mt-3 mb-4">
        <a href="{{url('types/create')}}">
            <button class="btn btn-success">Cadastrar-Tipos</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf
        <div class="table-responsive">
            <table class="table text-center table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($type as $types)
                    <tr>
                        <th scope="row">{{$types->id}}</th>
                        <th scope="row">{{$types->name}}</th>
                        <th scope="row">
                            <a href="{{url("types/$types->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </th>
                    </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
        {{$type->links()}}
    </div>
@endsection