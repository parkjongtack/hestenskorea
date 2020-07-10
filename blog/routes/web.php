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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Main@main');

Route::get('/sub/acc', 'Sub@acc');
Route::get('/sub/beds', 'Sub@beds');
Route::get('/sub/beds', 'Sub@contact_us');
Route::get('/sub/heritage01', 'Sub@heritage01');
Route::get('/sub/heritage02', 'Sub@heritage02');
Route::get('/sub/heritage03', 'Sub@heritage03');
Route::get('/sub/materials', 'Sub@materials');
Route::get('/sub/news', 'Sub@news');
Route::get('/sub/contact_us', 'Sub@contact_us');



