@extends('layout.template')
@section('titulo', 'Contatos')
@section('conteudo')
    <h3>Contatos</h3>
    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
        </tr>
        @foreach($contatos as $contato)
        <tr>
            <td>{{ $contato['nome'] }}</td>
            <td>{{ $contato['tel'] }}</td>
        </tr>
        @endforeach
    </table>
@endsection