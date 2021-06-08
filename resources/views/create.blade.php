@extends('layout')
@section('content')
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="/poll/save" method="POST">
        {{ csrf_field() }}
        <formulario-component> </formulario-component>
        <button class="btn btn-success" type="submit">Cadastrar</button>
    </form>
@endsection
