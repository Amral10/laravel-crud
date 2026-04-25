<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD-PHP</title>
</head>
asdasdasd
@php
    // dd($profile);
@endphp

<body>

    <a href="{{ route('user.index') }}">Listar</a><br>

    <h2>Visualizar Usuario</h2>

    @if (session('success'))
        <p style="color: #086">
            {{ session('success') }}
        </p>

    @endif

    ID: {{ $profile->id }}<br>
    Nome: {{ $profile->username }}<br>
    Bio: {{ $profile->bio }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($profile->created_at)->format('d/m/y h:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($profile->updated_at)->format('d/m/y h:i:s') }}<br>
    {{-- <a href="{{ route('profile.edit', ['profile' => $profile->id]) }}">Editar</a><br> --}}
    {{-- <form method="POST" action="{{ route('profile.destroy', ['profile' => $profile->id]) }}"> --}}
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('tem certeza q deseja deletar?')">Apagar</button>
    </form>

</body>

</html>