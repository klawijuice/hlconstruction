<?php

use App\Http\Controllers\Guest\PostsController;
use App\Http\Controllers\Guest\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PagesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Ce group permet de gérer les locales
 */
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    // Route pour afficher la page d'accueil
    Route::get('/', [PagesController::class, 'index'])->name('guest.pages.index');

    // Route pour afficher la page about
    Route::get('/about', [PagesController::class, 'about'])->name('guest.pages.about');

    // Route pour afficher la page contact
    Route::get('/contact', [PagesController::class, 'contact'])->name('guest.pages.contact');

    Route::post('/contact', [PagesController::class, 'submit'])->name("guest.contact.submit");
    Route::get('/products', [ProductsController::class, 'index'])->name("guest.products.index");
    Route::get('/products/{id}-{slug}', [ProductsController::class, 'show'])->name("guest.products.show");

    // Affichage du blog
    Route::get('/sold', [PostsController::class, 'index'])->name("guest.sold.products");
    Route::get('/posts/{id}-{slug}', [PostsController::class, 'show'])->name("guest.posts.show");
});

