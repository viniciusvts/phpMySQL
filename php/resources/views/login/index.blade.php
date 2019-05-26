@extends('layout.template')
@section('titulo', 'Cursos')
@section('conteudo')
<div class="container">
    <h3 class="center">Entrar</h3>
    <div class="row">
      <div class="col s10 m7">

        <form class="center" action="{{ route('login.entrar') }}" method="post">
          {{ csrf_field() }}
          <div class="input-field">
              <input type="email" name="email">
              <label>Email</label>
          </div>
          <div class="input-field">
            <input type="password" name="senha">
            <label>Senha</label>
          </div>
          <button class="btn blue">Entrar</button>
          <a href="{{ route('home')}}" class="btn">Cancelar</a>
        </form>

      </div>
    </div>
</div>
@endsection
