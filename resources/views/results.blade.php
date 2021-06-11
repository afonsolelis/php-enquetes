<html>

<head>
    <title>Sistema de Votos</title>
</head>

<body>
    <input type="hidden" name="id" value={{ $poll->id }} />
    <h1>{{ $poll->title }}</h1>
    <p>{{ $poll->description }}</p>
    <p>{{ $poll->closes_at }}</p>
    @forelse ($parcial as $k => $p)
    <br />
    <label>
        Votos: {{ $p->votes }} - {{ $options[$k]->value }}
    </label>
    @empty
    Sem votos.
    @endforelse
</body>
