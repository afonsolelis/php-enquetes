@extends('layout')
@section('content')
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

        <form action="/poll/save/{{ $poll->id }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value={{ $poll->id }} />
            <input type="text" name="title" value={{ $poll->title }} />
            <input type="date" name="closes_at" value={{ $poll->closes_at }} />
            <textarea name="description">{{ $poll->description }}</textarea>
            <input type="text" name="options[]" required value={{ $options[0]->value }} />
            <input type="hidden" name="options_id[]" required value={{ $options[0]->id }} />
            <input type="text" name="options[]" required value={{ $options[1]->value }} />
            <input type="hidden" name="options_id[]" required value={{ $options[1]->id }} />
            <input type="text" name="options[]" required value={{ $options[2]->value }} />
            <input type="hidden" name="options_id[]" required value={{ $options[2]->id }} />
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

@endsection
