 
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
            <div class="form-group mb-4">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse email" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary mt-3">Envoyer le lien de réinitialisation</button>
            </div>

            <div class="mb-2">
                <p class="text-center text-muted md-3">
                    <a href="{{ route('login') }}" class="btn btn-primary mt-3">Retour à la connexion</a>
                </p>  
            </div>  </form>
    </div>
</body>
</html>