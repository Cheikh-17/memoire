<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretaireController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hom', function () {
    return view('app');
});
Route::get('/ho', function () {
    return view('app1');
});
Route::get('/home', function () {
    return view('pages.front-end.Accueil.home');
})->name('home');
Route::get('/loginAdmin', function () {
    return view('pages.front-end.admin.loginAdmin');
})->name('loginAdmin');
Route::get('/passeForget', function () {
    return view('pages.front-end.auth.passeForget');
})->name('passeForget');
//middleware auth
Route::middleware(['auth'])->group(function () {
Route::get('/connexion', function () {
    return view('pages.front-end.auth.connexion');
})->name('login');
});

Route::get('/reset', function () {
    return view('pages.front-end.Accueil.reset-password');
})->name('reset');
Route::get('/contact', function () {
    return view('pages.front-end.Accueil.contact');
})->name('contacter');
Route::get('/prestation', function () {
    return view('pages.front-end.Accueil.prestation');
})->name('service');
Route::get('/propos', function () {
    return view('pages.front-end.Accueil.propos');
})->name('propos');
Route::get('/dashboard-admin', function () {
    return view('pages.front-end.admin.dashboardAdmin');
})->name('dashboard-admin');
Route::get('/dashboard-secretaire', function () {
    return view('pages.front-end.Secretaire.DashboardSecretaire');
})->name('dashboard-secretaire');
Route::get('/dashboard-medecin', function () {
    return view('pages.front-end.medecin.DashboardMedecin');
})->name('dashboard-medecin');
Route::get('/dashboard-patient', function () {
    return view('pages.front-end.patient.DashboardPatient');
})->name('dashboard-patient');

Route::get('/create' , function () {
    return view('pages.front-end.admin.medecin.createMedecin');
})->name('create');
// creation de  secretaire
 Route::get('/creerSecretaire' , function () {
    return view('pages.front-end.admin.secretaire.creerSecretaire');
})->name('creerSecretaire');

//cretion de patient
Route::get('/creerPatient' , function () {
    return view('pages.front-end.Secretaire.patient.creerPatient');
})->name('creerPatient');
 
//route pour faire un enregistrement secretaire
// Route::resource('/creerSecretaire', SecretaireController::class)->name('creerSecretaire');

