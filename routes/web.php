<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hom', function () {
    return view('app');
});
Route::get('/home', function () {
    return view('pages.front-end.home');
});
Route::get('/loginAdmin', function () {
    return view('pages.front-end.admin.loginAdmin');
});
Route::get('/inscription', function () {
    return view('pages.front-end.inscription');
});
Route::get('/connexion', function () {
    return view('pages.front-end.connexion');
});

