<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
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
              <img src="{{ asset('../assets/images/authentication/img-auth-login.png') }}" alt="images" class="img-fluid mb-3">
              <h4 class="f-w-500 mb-1">Connexion</h4>
              <p></p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}">
              @csrf
              <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
              </div>
              <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="d-flex mt-1 justify-content-between align-items-center">
                <div class="form-check">
                  <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked>
                  <label class="form-check-label text-muted" for="customCheckc1">Se souvenir de moi?</label>
                </div>
                <a href="{{ route('passeForget') }}">
                  <h6 class="f-w-400 mb-0">Forgot Password?</h6>
                </a>
              </div>
                <div class="d-grid mt-4">
                <button type="submit" class="btn" style="background-color: #026952; color: #fff;">Se connecter</button>
                </div>
            </form>

            {{-- <!-- Social Login -->
            <div class="saprator my-3">
              <span>Or continue with</span>
            </div> --}}
            
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
