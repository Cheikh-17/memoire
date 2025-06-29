@extends('app')
@section('content')

{{-- <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">Retour au dashboard</a> --}}
                <div class="col-md-12">
                    <ul class="breadcrumb" style="background-color: transparent;">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}" style="color: #026952;">Dashboard</a>
                        </li>
                    </ul>
                </div>
 <!-- Header Start -->
 <div class="container-fluid header p-0 mb-5" style="background-color: #026952 !important;">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
            <h1 class="display-4 text-white mb-5">Une Bonne Santé Dentaire Est La Clé Du Bonheur</h1>
            <div class="row g-4">
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">4</h2>
                        <p class="text-light mb-0">Expert Doctors</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">123</h2>
                        <p class="text-light mb-0"> Staff Medical</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="border-start border-light ps-4">
                        <h2 class="text-white mb-1" data-toggle="counter-up">12345</h2>
                        <p class="text-light mb-0">Total Patients</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="owl-carousel-text">
                        <h1 class="display-1 text-white mb-0">Soins dentaire</h1>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="owl-carousel-text">
                        <h1 class="display-1 text-white mb-0">Implantologie</h1>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-3.jpg" alt="">
                    <div class="owl-carousel-text">
                        <h1 class="display-1 text-white mb-0">Esthétique dentaire</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <img class="img-fluid rounded w-75 align-self-end" src="img/about-1.jpg" alt="">
                    <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="img/about-2.jpg" alt="" style="margin-top: -25%;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block border rounded-pill py-1 px-4">À propos de nous</p>
                <h1 class="mb-4">Pourquoi Nous Faire Confiance ? Apprenez À Nous Connaître !</h1>
                <p>Nous sommes dédiés à offrir des soins dentaires de qualité supérieure pour garantir votre santé bucco-dentaire et votre bien-être général.</p>
                <p class="mb-4">Avec une équipe de professionnels expérimentés et des technologies de pointe, nous nous engageons à répondre à vos besoins spécifiques avec compassion et expertise.</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Soins dentaires de qualité</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Des dentistes qualifiés</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Professionnels en recherche médicale</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">En savoir plus</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Services</p>
            <h1>Solutions de soins de santé</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp " id="soins" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded h-100 p-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                        <i class="fa fa-smile text-primary fs-4"></i>
                    </div>
                    <h4 class="mb-3" >Soins Dentaires</h4>
                    <p class="mb-4">Nous proposons des soins dentaires complets pour maintenir votre santé bucco-dentaire et préserver votre sourire éclatant.</p>
                    <a class="btn" href="/services/soins-dentaires"><i class="fa fa-plus text-primary me-3"></i>En savoir plus</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" id="implan" data-wow-delay="0.3s">
                <div class="service-item bg-light rounded h-100 p-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                        <i class="fa fa-tooth text-primary fs-4"></i>
                    </div>
                    <h4 class="mb-3">Implantologie Dentaire</h4>
                    <p class="mb-4">Nous offrons des solutions avancées d'implantologie pour remplacer vos dents manquantes et restaurer votre sourire avec des implants durables et esthétiques.</p>
                    <a class="btn" href="/services/implantologie"><i class="fa fa-plus text-primary me-3"></i>En savoir plus</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" id="ortho" data-wow-delay="0.5s">
                <div class="service-item bg-light rounded h-100 p-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                        <i class="fa fa-teeth text-primary fs-4"></i>
                    </div>
                    <h4 class="mb-3">Orthodontie</h4>
                    <p class="mb-4">Nous proposons des traitements d'orthodontie pour aligner vos dents et améliorer votre santé bucco-dentaire. Nos solutions sont adaptées à tous les âges.</p>
                    <a class="btn" href="/services/orthodontie"><i class="fa fa-plus text-primary me-3"></i>En savoir plus</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" id="esthe" data-wow-delay="0.1s">
                <div class="service-item bg-light rounded h-100 p-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                        <i class="fa fa-grin-beam text-primary fs-4"></i>
                    </div>
                    <h4 class="mb-3">Esthétique Dentaire</h4>
                    <p class="mb-4">Nous offrons des soins d'esthétique dentaire pour améliorer votre sourire et votre confiance en vous. Nos traitements sont adaptés à vos besoins spécifiques.</p>
                    <a class="btn" href="/services/esthetic-dentistry"><i class="fa fa-plus text-primary me-3"></i>En savoir plus</a>
                </div>
            </div>
           
            <div class="col-lg-4 col-md-6 wow fadeInUp" id="parod" data-wow-delay="0.5s">
                <div class="service-item bg-light rounded h-100 p-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                        <i class="fa fa-heartbeat text-primary fs-4"></i>
                    </div>
                    <h4 class="mb-3">Parodontologie</h4>
                    <p class="mb-4">Nous offrons des traitements spécialisés en parodontologie pour prévenir et traiter les maladies des gencives, assurant ainsi une santé bucco-dentaire optimale.</p>
                    <a class="btn" href="/services/parodontologie"><i class="fa fa-plus text-primary me-3"></i>En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Feature Start -->
<div class="container-fluid overflow-hidden my-5 px-lg-0" style="background-color: #026952 !important;">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="p-lg-5 ps-lg-0">
                    <p class="d-inline-block border rounded-pill text-light py-1 px-4">Caractéristiques</p>
                    <h1 class="text-white mb-4">Pourquoi Nous Choisir</h1>
                    <p class="text-white mb-4 pb-2">Nous nous engageons à fournir des soins dentaires de qualité supérieure avec une équipe expérimentée et des services adaptés à vos besoins spécifiques.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fa fa-user-md text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Expérience</p>
                                    <h5 class="text-white mb-0">Dentistes</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fa fa-check text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Qualité</p>
                                    <h5 class="text-white mb-0">Services</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fa fa-comment-medical text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Consultations</p>
                                    <h5 class="text-white mb-0">Positives</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                    <i class="fa fa-headphones text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-white mb-2">Support</p>
                                    <h5 class="text-white mb-0">7j/7j</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="img/feature.jpg" style="object-fit: cover;" alt="Caractéristiques du cabinet dentaire">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Nos Médecins</p>
            <h1>Rencontrez Notre Équipe</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-1.jpg" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Nos Doctors</h5>
                        <p class="text-primary">Departement</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-2.jpg" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Nos Doctors</h5>
                        <p class="text-primary">Departement</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-3.jpg" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Nos Doctors</h5>
                        <p class="text-primary">Departement</p>
                         
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item position-relative rounded overflow-hidden">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-4.jpg" alt="">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Doctor Name</h5>
                        <p class="text-primary">Department</p>
                        {{-- <div class="team-social text-center">
                            <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Témoignages</p>
            <h1>Ce Que Disent Nos Patients !</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Un service exceptionnel ! Les dentistes sont très professionnels et attentionnés. Je recommande vivement ce cabinet dentaire.</p>
                    <h5 class="mb-1">Marie curry</h5>
                    <span class="fst-italic">Ingénieur</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Je suis très satisfait des soins reçus. L'équipe est accueillante et les équipements sont modernes.</p>
                    <h5 class="mb-1">Jean Dupont</h5>
                    <span class="fst-italic">Professeure</span>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-3.jpg" style="width: 100px; height: 100px;">
                <div class="testimonial-text rounded text-center p-4">
                    <p>Un grand merci à toute l'équipe pour leur professionnalisme et leur gentillesse. Mon sourire n'a jamais été aussi éclatant !</p>
                    <h5 class="mb-1">Paul Martin</h5>
                    <span class="fst-italic">Comptable</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
     @endsection