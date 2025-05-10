<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hom', function () {
    return view('app');
});
Route::get('/home', function () {
    return view('pages.front-end.Accueil.home');
})->name('home');
Route::get('/loginAdmin', function () {
    return view('pages.front-end.admin.loginAdmin');
})->name('loginAdmin');
Route::get('/inscription', function () {
    return view('pages.front-end.auth.inscription');
})->name('inscription');

Route::get('/connexion', function () {
    return view('pages.front-end.auth.connexion');
})->name('login');

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

