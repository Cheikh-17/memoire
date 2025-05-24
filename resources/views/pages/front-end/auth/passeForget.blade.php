<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Réinitialiser le mot de passe</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('passeForget.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse email" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Envoyer le lien de réinitialisation</button>
        </form>
    </div>
</body>
</html>
