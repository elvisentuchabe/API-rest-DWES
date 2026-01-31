<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/licencias', function () {
    return view('licencias');
});

Route::get('/aviso-legal', function () {
    return view('aviso-legal');
});
