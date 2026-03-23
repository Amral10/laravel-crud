<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="theme">
        <div class="container">
            <h1>Registrar</h1>

            <form action="{{ route('user-store') }}" method="POST">
                @csrf
                @method('POST')
                <input type="text" name="name" placeholder="Nome:" value="{{ old('name') }}"><br><br>

                <input type="email" name="email" placeholder="Email:" value="{{ old('email') }}"><br><br>

                <input type="password" name="password" placeholder="Senha:" value="{{ old('password') }}"><br><br>

                <button type="submit">Cadastrar</button>

                @if ($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
            <div class="footer-links">
                <a href="{{ route('user.index') }}">Já tem uma conta? Listar usuários</a>
            </div>
        </div>
    </div>






<<<<<<< HEAD
=======
        <label>Bio: </label>
        <input type="text" name="bio" id="insira uma descrição"><br><br>
        
        <button type="submit">Cadastrar</button>
    </form>
>>>>>>> 054ae5405cf8a239f156fc660f9ee952d4715dd9
</body>

</html>