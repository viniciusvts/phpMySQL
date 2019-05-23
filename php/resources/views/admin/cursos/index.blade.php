@extends('layout.template')
@section('titulo', 'Cursos')
@section('conteudo')
<div class="container">
    <h3 class="center">Lista de cursos</h3>
    <div class="row">
        <table>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Publicado</th>
                <th>Ação</th>
            </tr>
            @foreach($registros as $registro)
              <tr>
                <td>{{ $registro->id}}</td>
                <td>{{ $registro->titulo}}</td>
                <td>{{ $registro->descricao}}</td>
                <td>
                  <a href="{{ asset($registro->imagem) }}">
                    <img height="50px"
                        src="{{ asset($registro->imagem) }}"
                        alt=" {{$registro->imagem}}"/>
                  </a>
                </td>
                <td>{{ $registro->valor}}</td>
                <td>{{ $registro->publicado }}</td>
                <td>
                    <a class="btn deep-orange"
                        href="{{ route('admin.cursos.editar',$registro->id) }}">
                            Editar
                    </a>
                    <a class="btn deep-red"
                    href="{{ route('admin.cursos.deletar',$registro->id) }}">
                        Deletar
                    </a>
                </td>
              </tr
            @endforeach>
        </table>
    </div>
    <div class="row">
        <a class="btn deep-blue" href="{{route('admin.cursos.adicionar')}}">Adicionar</a>
    </div>
</div>
@endsection
