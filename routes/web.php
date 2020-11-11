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
    return redirect('login');
});
Auth::routes(['register' => false]);

// Route::get('/companies', function () {
//     return view('companies.index');
// });
Route::resource('companies', 'CompaniesController');
Route::get('/employes', function () {
    return view('employes.index');
});
// Route::get('/', function () {
//     return redirect('login');
// });


Route::get('/home', function () {
    return redirect('companies');
});
