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
