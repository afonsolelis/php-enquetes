<html>
<head>
    <title>Sistema de Votos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container" id="app">
    @yield('content')
</div>
</body>
<script src="{{asset('js/app.js')}}"></script>
</html>
