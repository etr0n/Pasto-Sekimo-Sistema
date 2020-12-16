<?php

use App\Http\Controllers\PastoSkyriusController;
use App\Http\Controllers\SiuntaController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Route::get('/users', 'UsersController@index')->name('admin.users.index'); */


Route::resource('/pastai', 'PastoSkyriusController', ['except'=> ['show']]);

Route::resource('/ivykiulaikai', 'IvykiuLaikaiController', ['except'=> ['show']]);


Route::get('/siuntos/kliento', [SiuntaController::class, 'viewkliento'])->name('siuntos.viewkliento');
Route::resource('/siuntos', 'SiuntaController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:vartotoju-nustatymai')->group(function(){
    Route::resource('/users', 'UsersController', ['except'=> ['show','create','store']]);
   
});