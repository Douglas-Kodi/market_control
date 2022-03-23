<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado - Made in Laravel</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <style>
        .cent{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<header class="p-3 bg-dark text-white">
    <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a class="navbar-brand px-3 text-white" href="{{url('home')}}">
            <img src="{{url('assets/img/icon-market.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            Market
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        @php $id = Auth::id(); @endphp
        @if(auth()->check() AND auth()->user()->level==1)<li><a href="{{url("home/$id")}}" class="nav-link px-2 text-white">Meu Carrinho</a></li>@endif
        @if(auth()->check() AND auth()->user()->level==2)<li><a href="{{url('sales')}}" class="nav-link px-2 text-white">Vendas</a></li>@endif
        @if(auth()->check() AND auth()->user()->level==2)<li><a href="{{url('types')}}" class="nav-link px-2 text-white">Classificação</a></li>@endif
        @if(auth()->check() AND auth()->user()->level==2)<li><a href="{{url('markets')}}" class="nav-link px-2 text-white">Mercadorias</a></li>@endif
        @if(auth()->check() AND auth()->user()->level==2)<li><a href="{{url('users')}}" class="nav-link px-2 text-white">Usuários</a></li>@endif
        </ul>
        <div class="text-end">
            @if (Route::has('login'))
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>                
                @else
                <a href="{{ route('login') }}" type="button" class="btn btn-outline-light me-2">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" type="button" class="btn btn-warning">Registra-se</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
    </div>
</header>
<body>
    @yield('content')
    <script src="{{url("assets/js/javascript.js")}}"></script>
</body>
</html>