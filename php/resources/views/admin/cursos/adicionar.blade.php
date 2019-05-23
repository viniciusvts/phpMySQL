@extends('layout.template')
@section('titulo', 'Cursos')
@section('conteudo')
<div class="container">
    <h3 class="center">Adicionar cursos</h3>
    <div class="row">
      <form class="" action="{{ route('admin.cursos.salvar') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.cursos._form')
        <button class="btn deep-orange">Salvar</button>
        <a href="{{ route('admin.cursos')}}" class="btn">Cancelar</a>
      </form>
    </div>
</div>
@endsection
