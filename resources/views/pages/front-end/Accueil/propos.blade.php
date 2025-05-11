@extends('app')
@section('content')
<body>
<!-- À Propos Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="img/about-1.jpg" alt="Image à propos">
                    <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="img/about-2.jpg" alt="Image secondaire à propos" style="margin-top: -25%;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block border rounded-pill py-1 px-4">À Propos</p>
                <h1 class="mb-4">Pourquoi choisir notre cabinet dentaire ?</h1>
                <p>Notre cabinet offre des soins dentaires de haute qualité, adaptés à vos besoins, avec une équipe de professionnels expérimentés et passionnés.</p>
                <p class="mb-4">Nous utilisons des technologies modernes pour garantir des traitements efficaces et personnalisés, dans un environnement chaleureux et accueillant.</p>
                <p><i class="fas fa-check-circle text-primary me-3"></i>Soins adaptés à vos besoins</p>
                <p><i class="fas fa-check-circle text-primary me-3"></i>Équipe expérimentée et qualifiée</p>
                <p><i class="fas fa-check-circle text-primary me-3"></i>Technologies modernes</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="#services">En savoir plus</a>
            </div>
        </div>
    </div>
</div>
<!-- À Propos End -->

<!-- Caractéristiques Start -->
<div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="p-lg-5 ps-lg-0">
                    <p class="d-inline-block border rounded-pill text-light py-1 px-4">Caractéristiques</p>
                    <h1 class="text-white mb-4">Nos engagements</h1>
                    <p class="text-white mb-4 pb-2">Nous mettons tout en œuvre pour offrir des soins dentaires de qualité, avec une approche centrée sur le patient et des solutions innovantes.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fas fa-tooth text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Soins</p>
                                    <h5 class="text-white mb-0">Dentaires</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fas fa-smile text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Satisfaction</p>
                                    <h5 class="text-white mb-0">Client</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fas fa-clock text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Disponibilité</p>
                                    <h5 class="text-white mb-0">24/7</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fas fa-heartbeat text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Approche</p>
                                    <h5 class="text-white mb-0">Personnalisée</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="img/feature.jpg" style="object-fit: cover;" alt="Image des caractéristiques">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Caractéristiques End -->

<!-- Équipe Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Équipe</p>
            <h1>Rencontrez nos dentistes</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-1.jpg" alt="Dentiste 1">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Dr. Jean Dupont</h5>
                        <p class="text-primary">Chirurgien-Dentiste</p>
                        <div class="team-social text-center">
                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ajoutez d'autres membres de l'équipe ici -->
        </div>
    </div>
</div>
<!-- Équipe End -->
</body>
@endsection
