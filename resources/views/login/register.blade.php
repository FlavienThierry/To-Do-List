<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To- Do List</title>
</head>
<body>
    <h1>S'inscrire</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/register" method="post">
        @csrf
        <label for="name">Nom d'utilisateur</label>
        <input type="text" name="name" id="name" value="{{old('name')}}"><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"><br>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password"><br>

        <label for="password_confirmation">Confirmer votre mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>

        <button type="submit">S'inscrire</button>
    </form>
    <div>
        <a href="/login">Se connecter</a>
        <a href="/">retour</a>
    </div>
</body>
</html>