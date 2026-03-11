<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD-PHP</title>
</head>

<body>

    <a href="{{ route('user.index') }}">Listar</a><br>

    <h2>Visualizar Usuario</h2>

    @if (session('success'))
        <p style="color: #086">
            {{ session('success') }}
        </p>

    @endif
    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    Email: {{ $user->email }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/y h:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/y h:i:s') }}<br>
    <a href="{{ route('user.edit', ['user' => $user->id]) }}">Editar</a><br>
    @csrf
    @method('delete')

    <button type="submit" onclick="return confirm('tem certeza q deseja deletar?')">Apagar</button>
    </form>


</body>

</html>