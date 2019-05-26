<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <a href="{{ route('home') }}" class="brand-logo">CRUD</a>
            <a href="#" data-target="mobile" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('home') }}">Home</a></li>
                <!-- se não tem user autenticado-->
                @if(Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                @else
                <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                <li><a href="{{route('login.sair')}}">Sair</a></li>
                <li><a href="#">User: {{Auth::user()->name}}</a></li>
                @endif
            </ul>
            <ul class="sidenav" id="mobile">
                <li><a href="/">Home</a></li>
                <!--aqui eu repito o menu anterior-->
                @if(Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                @else
                <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                <li><a href="{{route('login.sair')}}">Sair</a></li>
                <li><a href="#">User: {{Auth::user()->name}}</a></li>
                @endif
            </ul>
        </div>
    </nav>

   
          