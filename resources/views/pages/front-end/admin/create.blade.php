
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Creation medecin</title>
  <!-- [Meta] -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="description"
    content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective."
  />
  <meta name="author" content="phoenixcoded" />

  <!-- [Favicon] icon -->
  <link rel="icon" href="{{asset('../assets/images/favicon.svg')}}" type="image/x-icon" />
 <!-- [Google Font : Public Sans] icon -->
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{asset('../assets/fonts/tabler-icons.min.css')}}" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{asset('../assets/fonts/feather.css')}}" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{asset('../assets/fonts/fontawesome.css')}}" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{asset('../assets/fonts/material.css')}}" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{asset('../assets/css/style.css')}}" id="main-style-link" >
<link rel="stylesheet" href="{{asset('../assets/css/style-preset.css')}}" >

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <div class="auth-main v2">
    <div class="bg-overlay bg-dark"></div>
    <div class="auth-wrapper">
      <div class="auth-sidecontent">
        {{-- <div class="auth-sidefooter">
          <img src="{{asset('../assets/images/logo-dark.svg')}}" class="img-brand img-fluid" alt="images" />
          <hr class="mb-3 mt-4" />
          <div class="row">
            <div class="col my-1">
              <p class="m-0">Made with ♥ by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank"> Phoenixcoded</a></p>
            </div>
            <div class="col-auto my-1">
              <ul class="list-inline footer-link mb-0">
                <li class="list-inline-item"><a href="../index.html">Home</a></li>
                <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/" target="_blank">Documentation</a></li>
                <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a></li>
              </ul>
            </div>
          </div>
        </div> --}}

      </div>
      <div class="auth-form">
        <div class="card my-5 mx-3">
          <div class="card-body">
            <h4 class="f-w-500 mb-1">creer un Medecin</h4>
            {{-- <p class="mb-3">Back to <a href="../pages/login-v2.html" class="link-primary">Se connecter</a></p> --}}
            <p> </p>
            <div class="mb-3">
              <label class="form-label">specialite</label>
              <input type="text" class="form-control" id="floatingInput" placeholder="specialite">
            </div>
            
            <div class="d-grid mt-4">
              <button type="button" class="btn btn-primary">enregistrer</button>
            </div>
             <div class="saprator my-3">
              <span>Or continue with</span>
            </div>
            <div class="text-center">
              <ul class="list-inline mx-auto mt-3 mb-0">
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/" class="avtar avtar-s rounded-circle bg-facebook" target="_blank">
                    <i class="fab fa-facebook-f text-white"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://twitter.com/" class="avtar avtar-s rounded-circle bg-twitter" target="_blank">
                    <i class="fab fa-twitter text-white"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://myaccount.google.com/" class="avtar avtar-s rounded-circle bg-googleplus" target="_blank">
                    <i class="fab fa-google text-white"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
</body>
<!-- [Body] end -->

</html>