<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To- Do List</title>
</head>
<body>
    <h1>Se connecter</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/login" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required><br>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Valider">
    </form>
    <div>
        <a href="/register">S'incrire</a>
        <a href="/">retour</a>
    </div>
</body>
</html>