<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-PHP</title>
</head>

<body>
    <h1>Posts</h1>

    @forelse ($posts as $post)

    Texto: {{ $post->post }} <br>
    anexo: {{ $post->anexo }}<br>
    user: {{ $post->user->name }}<br>
    email: {{ $post->user->email }}<br>
    bio: {{ $post->user->profile->bio }}<br><br>
    @endforeach

</body>

</html>