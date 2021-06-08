<html>

<head>
    <title>Sistema de Votos</title>
</head>

<body>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="/poll/vote/confirm/{{ $poll->id }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value={{ $poll->id }} />
        <h1>{{ $poll->title }}</h1>
        <p>{{ $poll->description }}</p>
        <p>{{ $poll->closes_at }}</p>

        <label>
            <input type="radio" name="opcao" value="{{ $options[0]->id }}" />
            {{ $options[0]->value }}
        </label>
        <br />
        <label>
            <input type="radio" name="opcao" value="{{ $options[1]->id }}" />
            {{ $options[1]->value }}
        </label>
        <br />
        <label>
            <input type="radio" name="opcao" value="{{ $options[2]->id }}" />
            {{ $options[2]->value }}
        </label>
        <br /><br />
        <button type="submit">Votar</button>
    </form>
</body>

</html>