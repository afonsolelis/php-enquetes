@extends('layout')
@section('content')
        <h2>Listagem de enquetes</h2>
        <hr>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>TITLE</td>
                <td>STATUS</td>
                <td>Inicio</td>
                <td>Fim</td>
                <td colspan="4">AÇÕES</td>
            </tr>
            @forelse ($polls as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>
                    @if($p->closes_at->isPast())
                        Encerrado
                    @elseif($p->starts_at->isFuture())
                        Não iniciada
                    @else
                        Ativa
                    @endif
                </td>
                <td>{{$p->starts_at->diffForHumans()}}</td>
                <td>{{$p->closes_at->diffForHumans()}}</td>
                <td><a href="poll/find/{{ $p->id }}" class="btn btn-primary">Editar</a></td>
                <td><a href="poll/show/{{ $p->id }}" class="btn btn-success">Visualizar</a></td>
                <td><a href="poll/delete/{{ $p->id }}" class="btn btn-danger">Remover</a></td>
                <td><a href="poll/results/{{ $p->id }}" class="btn btn-warning">Resultados</a></td>
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
