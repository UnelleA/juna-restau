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
    $companies=Compte::orderBy('id', 'asc')->paginate(8);
    // $companies=Compte::all();
    return view('accueil', compact('companies'));
})->name('home');

Route::get('/new', function () {
    return view('new.index');
});

/* les routes du panier*/

Route::get('/panier', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/delivey-is-no', 'App\Http\Controllers\CartController@deliverIsNo')->name('delivery.no');
Route::post('/delivey-is-yes', 'App\Http\Controllers\CartController@deliverIsYes')->name('delivery.yes');

// Route::get('/petitpanier', 'App\Http\Controllers\CartController@panier')->name('cart.panier');
Route::get('/panier/vide', 'App\Http\Controllers\CartController@empty')->name('cart.empty');
Route::post('/panier', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::get('/reservations', 'App\Http\Controllers\ReservationController@index')->name('reservations.index');
Route::get('/reservations/cancel', 'App\Http\Controllers\ReservationController@empty')->name('reservations.cancel');
Route::post('/reservations/add', 'App\Http\Controllers\ReservationController@store')->name('reservations.store');
Route::delete('/reservation/{rowId}', 'App\Http\Controllers\ReservationController@destroy')->name('reservations.destroy');
Route::post('/reservation/addQuantity', 'App\Http\Controllers\ReservationController@update')->name('reservations.update');
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
Route::resource('menu', 'App\Http\Controllers\RestoMetsController');
Route::get('/menu-du-jour/{slug}','App\Http\Controllers\MetsController@index')->name('mets.index');
Route::get('/menu-du-jour/{slug}/{category}','App\Http\Controllers\MetsController@show')->name('mets.show');
// Route::get('/menu/{id}','App\Http\Controllers\MetsController@index')->name('mets.index');

// compte
Route::get('/compte/gestion', 'App\Http\Controllers\CompteController@gestion')->name('compte.gestion');
Route::get('/compte/activaction', 'App\Http\Controllers\CompteController@activer')->name('compte.activer');
Route::resource('compte', 'App\Http\Controllers\CompteController');

// gestion client
Route::get('commande', 'App\Http\Controllers\GestionClientController@commande')->name('gestion_client.commande');
Route::get('reservation', 'App\Http\Controllers\GestionClientController@reservation')->name('gestion_client.reservation');
Route::get('livraison', 'App\Http\Controllers\GestionClientController@livraison')->name('gestion_client.livraison');


// abonnement
Route::get('/abonnement', 'App\Http\Controllers\AbonnementController@index')->name('abonnement.index');
Route::get('/abonnement/activate', 'App\Http\Controllers\AbonnementController@store')->name('abonnement.store');
Route::post('/compagnie/desactivation', 'App\Http\Controllers\AbonnementController@desactiver')->name('desactivation');
Route::post('/compagnie/activation', 'App\Http\Controllers\AbonnementController@activer')->name('activation');
Route::get('/abonnement/livreur', 'App\Http\Controllers\AbonnementController@livreur')->name('abonnement.livreur');


Route::get('/voirici/{slug}','App\Http\Controllers\MenueTextContoller@index')->name('mets.indexpaginate');


// notification
Route::resource('notification', 'App\Http\Controllers\NotificationController');

// routes de contact
Route::resource('contact', 'App\Http\Controllers\ContactController');
//resto
Route::get('{slug}/consulter', 'App\Http\Controllers\RestoController@consulter')->name('resto.consulter');
Route::get('show_resto/{slug}', 'App\Http\Controllers\CompteController@show_resto')->name('resto.show_resto');

Route::get('payement/reussi/recuperation-commande/FGTZwxsvsbh123365', 'App\Http\Controllers\PayementController@success')->name('payement.reussi');

/* ESSAIE DE PAGINATION */
// Route::get('/{slug}/pagination', 'App\Http\Controllers\MetsController@indexPaginate')->name('new.pagination');
// Route::get('/{slug}/pagination/fetch_data', 'App\Http\Controllers\MetsController@fetch_data')->name('new.pagination_data');
