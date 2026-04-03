<!DOCTYPE html>
<html>
<head><title>Connexion</title></head>
<body>
<h1>Connexion</h1>
{{-- Le formulaire envoie les données en POST à la route nommée
'login.post' --}}
<form method="POST" action="{{ route('login.post') }}">
@csrf {{-- ← TRÈS IMPORTANT ! Protection contre les attaques CSRF --}}
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Mot de passe"
required>
<button type="submit">Se connecter</button>
</form>
<p><a href="{{ route('register') }}">Pas encore de compte ?
Inscrivez-vous</a></p>
</body>
</html>