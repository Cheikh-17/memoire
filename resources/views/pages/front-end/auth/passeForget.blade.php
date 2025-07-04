<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Mot de passe oublier</title>
  <!-- Meta -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
  <meta name="author" content="phoenixcoded" />

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('../assets/images/favicon.svg') }}" type="image/x-icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('../assets/fonts/tabler-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../assets/fonts/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('../assets/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('../assets/fonts/material.css') }}">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('../assets/css/style-preset.css') }}">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  <!-- Pre-loader -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <!-- Authentication Section -->
  <div class="auth-main v1">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <!-- Header -->
            <div class="text-center">
              <img src="{{ asset('../assets/images/authentication/img-auth-fporgot-password.png') }}" alt="images" class="img-fluid mb-3">
              <h4 class="f-w-500 mb-1">Réinitialiser le mot de passe</h4>
              <p></p>
            </div>

            <!-- Reset Password Form -->
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
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse email" required>
                </div>
                <div class="d-grid mt-4">
                  <button type="submit" class="btn" style="background-color: #026952; color: #fff; border: none;">
                    Envoyer le lien de réinitialisation
                  </button>
                </div>
            </form>

            <div class="d-grid mt-4">
              <a href="{{ route('login') }}" class="btn mt-3" style="background-color: #026952; color: #fff; border: none;">
                Retour à la connexion
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
