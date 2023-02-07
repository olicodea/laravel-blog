<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the otos"web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@inicio')->name('inicio');

Route::get('/notas', 'PagesController@notas')->name('notas');

Route::get('notas/detalle/{id}', 'PagesController@detalle')->name('notas.detalle');

Route::get('notas/editar/{id}', 'PagesController@editar')->name('notas.editar');

Route::post('/notas', 'PagesController@crear')->name('notas.crear');

Route::put('notas/editar/{id}', 'PagesController@update')->name('notas.update');

Route::delete('notas/eliminar/{id}', 'PagesController@eliminar')->name('notas.eliminar');

Route::get('/noticias', 'PagesController@noticias')->name('noticias');

Route::get('/fakeStore', 'FakeStoreController@inicio')->name('fakeStore');
