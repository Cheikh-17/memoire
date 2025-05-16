<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0 text-primary"><img src="assets/images/dent.png" width="60px" height="60px"> Baobab Dentaire</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @if(Auth::check())
                <a href="{{route('home')}}" class="nav-item nav-link active">Accueil</a>
                <a href="{{route('propos')}}" class="nav-item nav-link">A propos</a>
                <a href="{{route('service')}}" class="nav-item nav-link">Prestation</a>
                <a href="{{route('contacter')}}" class="nav-item nav-link">Contact</a>
            @else
            <a href="{{route('home')}}" class="nav-item nav-link active">Accueil</a>
                <a href="{{route('service')}}" class="nav-item nav-link">Prestation</a>
                <a href="{{route('contacter')}}" class="nav-item nav-link">Contact</a>
            @endif
        </div>
        <a href="{{route('login')}}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Connexion<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->
