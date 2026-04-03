<!DOCTYPE html>
<html>

<head><title>Inscription</title></head>
<body>
<h1>Inscription</h1>
<form method="POST" action="{{ route('register.post') }}">
    @csrf
<input type="text" name="name" placeholder="Nom" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Mot de passe"
required>
{{-- Pour la confirmation : <input type="password"
name="password_confirmation"> --}}
<button type="submit">S'inscrire</button>
</form>
<p><a href="{{ route('login') }}">Déjà un compte ? Se connecter</a></p>
</body>
</html>