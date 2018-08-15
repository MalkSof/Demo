<?php

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
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Mail\PedidoHecho;

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{comida}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart', 'CartController@update')->name('cart.update');
Route::delete('cart/{comida}','CartController@destroy')->name('cart.destroy');



Route::post('/confirmacion','CheckoutController@store')->name('checkout.store');

Route::get('/gracias','ConfirmacionController@index')->name('confirmacion.index');
Route::get('/gracias','ConfirmacionController@index')->name('confirmacion.index');
Route::post('/gracias','ConfirmacionController@store')->name('confirmacion.store')->middleware('auth');

Route::post('/cupon','CuponsController@store')->name('cupon.store');
Route::delete('/cupon','CuponsController@destroy')->name('cupon.destroy');

Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('empty', function()
{
	Cart::destroy();

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mailable', function()
{
	$pedido = App\Pedido::find(1);
	

	return new PedidoHecho($pedido);
});
