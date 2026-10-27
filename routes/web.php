<?php 
use Illuminate\Support\Facades\Route;

// Ruta principal (Inicio)
Route::get('/', function () {
    return view('index');
})->name('home');

// Ruta del menú / tienda
Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Ruta del carrito (si la usas en tu navegación)
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
