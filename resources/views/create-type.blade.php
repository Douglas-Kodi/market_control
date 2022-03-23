@extends('templates.template')

@section('content')

    <h1 class="text-center mt-5">Cadastrar</h1>
    
    <div class="col-8 m-auto mt-5">
        
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        <form name="formCad" id="formCad" method="post" action="{{url('types')}}">
            @csrf
            <label for="name">Nome do tipo:</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="" value="" required><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection