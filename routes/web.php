<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});

Route::get('/new', function () {
    return view('new.index');
});

/* les routes de mets*/
Route::get('/restaurant', 'App\Http\Controllers\MetsController@index')->name('mets.index');
Route::get('/Ajouter/{title}', 'App\Http\Controllers\MetsController@show')->name('mets.show');
Route::get('/Menu', 'App\Http\Controllers\MetsController@menu')->name('mets.menu');

/* les routes du panier*/

Route::get('/panier', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/petitpanier', 'App\Http\Controllers\CartController@panier')->name('cart.panier');
Route::get('/reservation', 'App\Http\Controllers\CartController@reservation')->name('cart.reservation');
Route::post('/panier', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');
Route::patch('/panier/{rowId}', 'App\Http\Controllers\CartController@update')->name('cart.update');

// Route::get('/videpanier', function () {
//     Cart::destroy();
// });

//les routes du paiement

Route::get('/Paiement', 'App\Http\Controllers\CheckoutController@index')->name('paiement.index');
Route::get('/Paiement', 'App\Http\Controllers\CheckoutController@store')->name('paiement.store');

//les routes de compte
// Route::get('/compte', 'App\Http\Controllers\CompteController@accueil')->name('/accueil');
// Route::get('/deconnexion', 'App\Http\Controllers\CompteController@deconnexion')->name('compte.deconnexion');

Auth::routes();

Route::get('/client', 'App\Http\Controllers\ClientController@index')->name('client');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');
Route::get('/livreur', 'App\Http\Controllers\LivreurController@index')->name('livreur');
Route::get('/restaurateur', 'App\Http\Controllers\RestaurateurController@index')->name('restaurateur');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

//les routes du dashboard
Route::get('dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('auth');
Route::resource('categories', 'App\Http\Controllers\CategoryController');
Route::resource('profile', 'App\Http\Controllers\ProfileController');
// Route::get('/create', 'App\Http\Controllers\ProfileController@create')->name('profile');
Route::resource('menu', 'App\Http\Controllers\RestoMetsController');

// routes de contact

Route::resource('contact', 'App\Http\Controllers\ContactController');
