<?php

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
    return view('auth/login');
});

//Route::get('/user','UsuarioController@index');

Route::get('/home','HomeController@index');
Auth::routes();
Route::resource('clientes','ClienteController');
Route::resource('user','UsuarioController');
Route::resource('compras','CompraController');
Route::resource('FolioCompras','FolioCompraController');
Route::resource('ventas','VentaController');
Route::resource('FolioVentas','FolioVentaController');

Route::get('FolioCompra/excel/{id_folio}/{id_cliente}','FolioCompraController@exportExcel');
Route::get('/FolioCompra/pdf/{id_folio}/{id_cliente}','FolioCompraController@imprimir');

Route::get('FolioVenta/excel/{id_folio}/{id_cliente}','FolioVentaController@exportExcel');
Route::get('/FolioVenta/pdf/{id_folio}/{id_cliente}','FolioVentaController@imprimir');
