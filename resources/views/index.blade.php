@extends('layout')
@section('content')
        <h2>Listagem de enquetes</h2>
        <hr>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>TITLE</td>
                <td>STATUS</td>
                <td colspan="3">AÇÕES</td>
            </tr>
            @forelse ($polls as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ ($p->status == 1)?'Ativado':'Desativado' }}</td>
                <td><a href="poll/close/{{ $p->id }}" class="btn btn-danger">Fechar</a></td>
                <td><a href="poll/find/{{ $p->id }}" class="btn btn-primary">Editar</a></td>
                <td><a href="poll/delete/{{ $p->id }}">Remover</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Sem resultados.</td>
            </tr>
            @endforelse
        </table>
        <a href="/poll/create" class="btn btn-success">Criar</a>

        <example-component></example-component>

@endsection
