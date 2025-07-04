<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
  <meta name="author" content="phoenixcoded" />

  <!-- Favicon -->
  <link rel="icon" href="{{asset('../assets/images/favicon.svg')}}" type="image/x-icon" />

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="{{asset('../assets/css/plugins/jsvectormap.min.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('../assets/fonts/tabler-icons.min.css')}}" >
  <link rel="stylesheet" href="{{asset('../assets/fonts/feather.css')}}" >
  <link rel="stylesheet" href="{{asset('../assets/fonts/fontawesome.css')}}" >
  <link rel="stylesheet" href="{{asset('../assets/fonts/material.css')}}" >
  <link rel="stylesheet" href="{{asset('../assets/css/style.css')}}" id="main-style-link" >
  <link rel="stylesheet" href="{{asset('../assets/css/style-preset.css')}}" >
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  <!-- Pre-loader -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- Sidebar Menu -->
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="{{asset('../dashboard/index.html')}}" class="b-brand text-primary"></a>
        <a href="{{ route('home') }}" class="b-brand text-primary d-flex align-items-center">
          <img src="assets/images/dent.png" alt="Logo Cabinet" style="height:40px; width:auto; margin-right:10px;">
          <span class="fw-bold fs-5">BAOBAB DENTAIRE</span>
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item pc-caption"><label>Navigation</label></li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ph-duotone ph-house"></i></span>
              <span class="pc-mtext">Dashboard</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
               
            </a>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ph-duotone ph-users-three"></i></span>
              <span class="pc-mtext">Users</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
               
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="{{route('form')}}">creer Users</a></li>
            </ul>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ph-duotone ph-stethoscope"></i></span>
              <span class="pc-mtext">Medecin</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
               
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="{{route('medecin.index')}}">lister medecin </a></li>
            </ul>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ph-duotone ph-user-circle"></i></span>
              <span class="pc-mtext">Secretaire</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
               
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="{{route('secretaire.index')}}">lister secretaire</a></li>
            </ul>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link">
              <span class="pc-micon"><i class="ph-duotone ph-users"></i></span>
              <span class="pc-mtext">Patient</span>
              <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
               
            </a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="{{route('patients.index')}}">lister patient</a></li>
              <li class="pc-item"><a class="pc-link" href="">lister les patients du jours</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="pc-header">
    <div class="header-wrapper">
      <!-- Mobile Media Block -->
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a>
          </li>
          <li class="dropdown pc-h-item d-inline-flex d-md-none">
            <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="ph-duotone ph-magnifying-glass"></i>
            </a>
            <div class="dropdown-menu pc-h-dropdown drp-search">
              <form class="px-3">
                <div class="mb-0 d-flex align-items-center">
                  <input type="search" class="form-control border-0 shadow-none" placeholder="Rechercher..." />
                  <button class="btn btn-light-secondary btn-search">Rechercher</button>
                </div>
              </form>
            </div>
          </li>
          <li class="pc-h-item d-none d-md-inline-flex">
            <form class="form-search">
              <i class="ph-duotone ph-magnifying-glass icon-search"></i>
              <input type="search" class="form-control" placeholder="Rechercher..." />
              <button class="btn btn-search" style="padding: 0"><kbd>ctrl+k</kbd></button>
            </form>
          </li>
        </ul>
      </div>
      <!-- End Mobile Media Block -->
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item">
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="ph-duotone ph-sun-dim"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
              <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                <i class="ph-duotone ph-moon"></i>
                <span>Sombre</span>
              </a>
              <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                <i class="ph-duotone ph-sun-dim"></i>
                <span>Clair</span>
              </a>
              <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                <i class="ph-duotone ph-cpu"></i>
                <span>Par défaut</span>
              </a>
            </div>
          </li>
          <li class="pc-h-item">
            <a class="pc-head-link pct-c-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
              <i class="ph-duotone ph-gear-six"></i>
            </a>
          </li>
          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
              <img src="{{asset('../assets/images/user/avatar-2.jpg')}}" alt="image-utilisateur" class="user-avtar" />
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <h5 class="m-0">Profil</h5>
              </div>
              <div class="dropdown-body">
                <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                  <ul class="list-group list-group-flush w-100">
                    <li class="list-group-item">
                      <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          <img src="{{asset('../assets/images/user/avatar-2.jpg')}}" alt="image-utilisateur" class="wid-50 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 mx-3">
                          <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                          <a class="link-primary" href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                        </div>
                        <span class="badge bg-primary">PRO</span>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('password.change') }}" class="dropdown-item">
                        <span class="d-flex align-items-center">
                          <i class="ph-duotone ph-key"></i>
                          <span>Changer le mot de passe</span>
                        </span>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <a href="{{route('profile.edit')}}" class="dropdown-item">
                        <span class="d-flex align-items-center">
                          <i class="ph-duotone ph-user-circle"></i>
                          <span>Modifier le profil</span>
                        </span>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item btn btn-link d-flex align-items-center p-0" style="color: inherit; text-decoration: none; justify-content: flex-start;">
                          <i class="ph-duotone ph-power"></i>
                          <span>Déconnexion</span>
                        </button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <!-- End Header -->

  <!-- Main Content -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- Breadcrumb -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Home</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Breadcrumb -->

      <!-- Dashboard Widgets -->
      <div class="row">
        <!-- Statistiques principales -->
        <div class="col-md-4 col-sm-6">
          <div class="card statistics-card-1 overflow-hidden ">
            <div class="card-body">
              <img src="{{asset('../assets/images/widget/img-status-4.svg')}}" alt="img" class="img-fluid img-bg" >
              <h5 class="mb-4">Consultations du jour</h5>
              <div class="d-flex align-items-center mt-3">
                <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $consultationsJour ?? 0 }}</h3>
              </div>
              <p class="text-muted mb-2 text-sm mt-3">Nombre de consultations réalisées aujourd'hui</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="card statistics-card-1 overflow-hidden ">
            <div class="card-body">
              <img src="{{asset('../assets/images/widget/img-status-5.svg')}}" alt="img" class="img-fluid img-bg" >
              <h5 class="mb-4">Factures totales</h5>
              <div class="d-flex align-items-center mt-3">
                <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $facturesTotal ?? 0 }}</h3>
              </div>
              <p class="text-muted mb-2 text-sm mt-3">Nombre total de factures générées</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="card statistics-card-1 overflow-hidden bg-brand-color-3">
            <div class="card-body">
              <img src="{{asset('../assets/images/widget/img-status-6.svg')}}" alt="img" class="img-fluid img-bg" >
              <h5 class="mb-4 text-white">Revenus </h5>
              <div class="d-flex align-items-center mt-3">
                <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">{{ $revenusMois ?? '0 FCFA' }}</h3>
              </div>
              <p class="text-white text-opacity-75 mb-2 text-sm mt-3">Total des paiements reçus</p>
            </div>
          </div>
        </div>

        <!-- Carte des patients -->
        <div class="col-md-6 col-xl-7">
          <div class="card">
            <div class="card-header">
              <h5>Répartition des patients</h5>
            </div>
            <div class="card-body">
              <div id="world-map-markers" class="set-map" style="height:365px;"></div>
            </div>
          </div>
        </div>
            <!-- Bloc d'informations financières -->
            <div class="col-md-6 col-xl-5">
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                  <h5>Finances</h5>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="avtar avtar-s bg-light-primary flex-shrink-0">
                      <i class="ph-duotone ph-money f-20"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <p class="mb-0 text-muted">Total des recettes</p>
                      <h5 class="mb-0">{{ $totalRecettes ?? '0 FCFA' }}</h5>
                    </div>
                  </div>
                  <div id="earnings-users-chart"></div>
                </div>
              </div>
              <script src="{{asset('../assets/js/plugins/apexcharts.min.js')}}"></script>
              <div class="card mt-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="d-flex align-items-center">
                        <div class="avtar avtar-s bg-light-warning flex-shrink-0">
                          <i class="ph-duotone ph-lightning f-20"></i>
                        </div>
                        <div class="flex-grow-1 ms-2">
                          <p class="mb-0 text-muted">Actes réalisés</p>
                          <h6 class="mb-0">{{ $actesRealises ?? 0 }}</h6>
                        </div>
                      </div>
                    </div>
                     
                  </div>
                </div>
              </div>
            </div>

        <!-- Liste des derniers utilisateurs -->
        <div class="col-md-12 col-xl-12">
          <div class="card table-card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
              <h5>Derniers utilisateurs inscrits</h5>
            </div>
            <div class="card-body py-2 px-0">
              <div class="table-responsive">
                <table class="table table-hover table-borderless table-sm mb-0">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Profil</th>
                      <th>Date d'inscription</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($derniersUtilisateurs ?? [] as $user)
                      <tr>
                        <td>{{ $user->nom }} {{ $user->prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->profil }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Dashboard Widgets -->
    </div>
  </div>
  <!-- End Main Content -->

  <!-- Footer -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm-6 my-1">
          <p class="m-0">Made with &#9829; by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank"> Phoenixcoded</a></p>
        </div>
        <div class="col-sm-6 ms-auto my-1">
          <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
            <li class="list-inline-item"><a href="../index.html">Home</a></li>
            <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/" target="_blank">Documentation</a></li>
            <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Offcanvas Settings -->
  {{-- @include('partials.offcanvas-settings') --}}
  <!-- End Offcanvas Settings -->

  <!-- JS Plugins -->
  <script src="{{asset('../assets/js/plugins/apexcharts.min.js')}}"></script>
  <script src="{{asset('../assets/js/plugins/jsvectormap.min.js')}}"></script>
  <script src="{{asset('../assets/js/plugins/world.js')}}"></script>
  <script src="{{asset('../assets/js/plugins/world-merc.js')}}"></script>
  <script src="{{asset('../assets/js/pages/dashboard-default.js')}}"></script>
  <script src="{{asset('../assets/js/plugins/popper.min.js')}}"></script>
  <script src="{{asset('../assets/js/plugins/simplebar.min.js')}}"></script>
  <script src="{{asset('../assets/js/plugins/bootstrap.min.js')}}"></script>
  <script src="{{asset('../assets/js/fonts/custom-font.js')}}"></script>
  <script src="{{asset('../assets/js/pcoded.js')}}"></script>
  <script src="{{asset('../assets/js/plugins/feather.min.js')}}"></script>

  <!-- Layout Scripts -->
  <script>layout_change('light');</script>
  <script>layout_sidebar_change('light');</script>
  <script>change_box_container('false');</script>
  <script>layout_caption_change('true');</script>
  <script>layout_rtl_change('false');</script>
  <script>preset_change("preset-1");</script>
</body>
</html>
