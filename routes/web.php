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
    $companies=Compte::orderBy('id', 'asc')->paginate(4);
    // $companies=Compte::all();
    return view('accueil', compact('companies'));
})->name('home');

Route::get('/new', function () {
    return view('new.index');
});

/* les routes du panier*/

Route::get('/panier', 'App\Http\Controllers\CartController@index')->name('cart.index');
// Route::get('/petitpanier', 'App\Http\Controllers\CartController@panier')->name('cart.panier');
Route::get('/panier/vide', 'App\Http\Controllers\CartController@empty')->name('cart.empty');
Route::post('/panier', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::get('/reservations', 'App\Http\Controllers\ReservationController@index')->name('reservations.index');
Route::get('/reservations/cancel', 'App\Http\Controllers\ReservationController@empty')->name('reservations.cancel');
Route::post('/reservations/add', 'App\Http\Controllers\ReservationController@store')->name('reservations.store');
Route::delete('/reservation/{rowId}', 'App\Http\Controllers\ReservationController@destroy')->name('reservations.destroy');
Route::post('/reservation/addQuantity', 'App\Http\Controllers\ReservationControlle@update')->name('reservations.update');
 Route::post('/panier/addQuantity', 'App\Http\Controllers\CartController@update')->name('cart.update');

//  auth
Auth::routes();
// home
Route::get('/home', 'App\Http\Controllers\HomeController@index');

// type user
Route::get('/client', 'App\Http\Controllers\ClientController@index')->name('client');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');
Route::get('/livreur', 'App\Http\Controllers\LivreurController@index')->name('livreur');
Route::get('/restaurateur', 'App\Http\Controllers\RestaurateurController@index')->name('restaurateur');



//les routes du dashboard
Route::get('dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('auth');
Route::resource('categories', 'App\Http\Controllers\CategoryController');
Route::resource('profile', 'App\Http\Controllers\ProfileController');
// Route::get('/create', 'App\Http\Controllers\ProfileController@create')->name('profile');
Route::resource('menu', 'App\Http\Controllers\RestoMetsController');
// Route::get('{slug}/menu-du-jour', ['as' => 'user.', 'uses' => 'MetsController@index'])->name('mets.index');
Route::get('/{slug}/menu-du-jour/','App\Http\Controllers\MetsController@index')->name('mets.index');
// compte
Route::get('/compte/gestion', 'App\Http\Controllers\CompteController@gestion')->name('compte.gestion');
Route::get('/compte/activaction', 'App\Http\Controllers\CompteController@activer')->name('compte.activer');
Route::resource('compte', 'App\Http\Controllers\CompteController');
// gestion client
Route::get('commande', 'App\Http\Controllers\GestionClientController@commande')->name('gestion_client.commande');
Route::get('reservation', 'App\Http\Controllers\GestionClientController@reservation')->name('gestion_client.reservation');


// abonnement
Route::get('/abonnement', 'App\Http\Controllers\AbonnementController@index')->name('abonnement.index');
Route::get('/abonnement/activate', 'App\Http\Controllers\AbonnementController@store')->name('abonnement.store');
Route::post('/compagnie/desactivation', 'App\Http\Controllers\AbonnementController@desactiver')->name('desactivation');
Route::post('/compagnie/activation', 'App\Http\Controllers\AbonnementController@activer')->name('activation');
Route::get('/abonnement/livreur', 'App\Http\Controllers\AbonnementController@livreur')->name('abonnement.livreur');


// notification
Route::resource('notification', 'App\Http\Controllers\NotificationController');

// routes de contact
Route::resource('contact', 'App\Http\Controllers\ContactController');
//resto
Route::get('{slug}/consulter', 'App\Http\Controllers\RestoController@consulter')->name('resto.consulter');

/* ESSAIE DE PAGINATION */
// Route::get('/{slug}/pagination', 'App\Http\Controllers\MetsController@indexPaginate')->name('new.pagination');
// Route::get('/{slug}/pagination/fetch_data', 'App\Http\Controllers\MetsController@fetch_data')->name('new.pagination_data');
