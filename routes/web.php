<?php
use App\Http\Controllers\UserController;
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
Route::resource('order','OrderController');
Route::resource('product','ProductController');
Route::resource('suppliers','SupplierController');
Route::resource('tranaction','TransactionController');
Route::resource('users','UserController');
Route::resource('companies','CompanyController');
Route::get('barcodes','ProductController@getProductbarcode')->name('product.barcode');
//Route::get('barcodes','ProductController@getBarcode')->name('product.barcodes');