<?php

use App\Models\Compte;
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
    $companies=Compte::all();
    return view('accueil', compact('companies'));
})->name('home');

Route::get('/new', function () {
    return view('new.index');
});

/* les routes de mets*/
// Route::get('/Ajouter/{title}', 'App\Http\Controllers\MetsController@show')->name('mets.show');
// Route::get('/Menu', 'App\Http\Controllers\MetsController@menu')->name('mets.menu');

/* les routes du panier*/

Route::get('/panier', 'App\Http\Controllers\CartController@index')->name('cart.index');
// Route::get('/petitpanier', 'App\Http\Controllers\CartController@panier')->name('cart.panier');
Route::get('/reservation', 'App\Http\Controllers\CartController@reservation')->name('cart.reservation');
Route::post('/panier', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');
Route::patch('/panier/{rowId}', 'App\Http\Controllers\CartController@update')->name('cart.update');

// Route::get('/videpanier', function () {
//     Cart::destroy();
// });

//les routes du paiement

// Route::get('/Paiement', 'App\Http\Controllers\CheckoutController@index')->name('paiement.index');
// Route::get('/Paiement', 'App\Http\Controllers\CheckoutController@store')->name('paiement.store');

//les routes de compte
// Route::get('/compte', 'App\Http\Controllers\CompteController@accueil')->name('/accueil');
// Route::get('/deconnexion', 'App\Http\Controllers\CompteController@deconnexion')->name('compte.deconnexion');

Auth::routes();

Route::get('/client', 'App\Http\Controllers\ClientController@index')->name('client');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');
Route::get('/livreur', 'App\Http\Controllers\LivreurController@index')->name('livreur');
Route::get('/restaurateur', 'App\Http\Controllers\RestaurateurController@index')->name('restaurateur');

Route::get('/home', 'App\Http\Controllers\HomeController@index');

//les routes du dashboard
Route::get('dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('auth');
Route::resource('categories', 'App\Http\Controllers\CategoryController');
Route::resource('profile', 'App\Http\Controllers\ProfileController');
// Route::get('/create', 'App\Http\Controllers\ProfileController@create')->name('profile');
Route::resource('menu', 'App\Http\Controllers\RestoMetsController');
Route::get('/{slug}/menu-du-jour', 'App\Http\Controllers\MetsController@index')->name('mets.index');
// compte
Route::get('/compte/gestion', 'App\Http\Controllers\CompteController@gestion')->name('compte.gestion');
Route::get('/compte/activaction', 'App\Http\Controllers\CompteController@activer')->name('compte.activer');
Route::resource('compte', 'App\Http\Controllers\CompteController');


// abonnement
// Route::resource('abonnement', 'App\Http\Controllers\AbonnementController');
// Route::get('/abonnement/compagnies', 'App\Http\Controllers\AbonnementController@activer')->name('abonnement.abonner');
Route::get('/abonnement', 'App\Http\Controllers\AbonnementController@index')->name('abonnement.index');
Route::get('/abonnement/activate', 'App\Http\Controllers\AbonnementController@store')->name('abonnement.store');


Route::post('/compagnie/desactivation', 'App\Http\Controllers\AbonnementController@desactiver')->name('desactivation');
Route::post('/compagnie/activation', 'App\Http\Controllers\AbonnementController@activer')->name('activation');
// notification
Route::resource('notification', 'App\Http\Controllers\NotificationController');


// routes de contact

Route::resource('contact', 'App\Http\Controllers\ContactController');
