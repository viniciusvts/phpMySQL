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
            <tr>
            @foreach($registros as $registro)
                <td>{{ $registro->id}}</td>
                <td>{{ $registro->titulo}}</td>
                <td>{{ $registro->descrição}}</td>
                <td>
                    <img width="120px" 
                        src="{{ asset($registro->imagem) }}" 
                        alt=" {{$registro->imagem}}"/>
                </td>
                <td>{{ $registro->valor}}</td>
                <td>{{ $registro->publicado }}</td>
                <td>
                    <a class="btn deep-orange" 
                        href="{{ route('admin.cursos.editar'),$registro->id }}">
                            Editar
                    </a>
                    <a class="btn deep-red" 
                    href="{{ route('admin.cursos.deletar'),$registro->id }}">
                        Deletar
                    </a>
                </td>
            @endforeach
            </tr>
        </table>
    </div>
    <div class="row">
        <a class="btn deep-blue" href="{{route('admin.cursos.adicionar')}}">Adicionar</a>
    </div>
</div>
@endsection