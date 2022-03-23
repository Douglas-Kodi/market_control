@extends('templates.template')

@section('content')

    <div class="text-center mt-3 mb-4">
        <a href="{{ route('register') }}">
            <button class="btn btn-success">Cadastrar-User</button>
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
                        <th scope="col">Email</th>
                        <th scope="col">Permissão</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $users)
                    <tr>
                        <th scope="row">{{$users->id}}</th>
                        <th scope="row">{{$users->name}}</th>
                        <th scope="row">{{$users->email}}</th>
                        <th scope="row">{{$users->level}}</th>
                        <th scope="row">
                            <a href="{{url("users/$users->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </th>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            
        </div>
        {{$user->links()}}
    </div>
@endsection