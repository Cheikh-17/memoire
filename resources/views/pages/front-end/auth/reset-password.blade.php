<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Choisissez un nouveau mot de passe</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse email" required>
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nouveau mot de passe" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmez le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmez le mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>
</html>
