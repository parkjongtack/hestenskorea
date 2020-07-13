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
Route::get('/sub/beds/sub', 'Sub@beds_sub');
Route::get('/sub/contact_us', 'Sub@contact_us');
Route::get('/sub/heritage01', 'Sub@heritage01');
Route::get('/sub/heritage02', 'Sub@heritage02');
Route::get('/sub/heritage03', 'Sub@heritage03');
Route::get('/sub/materials', 'Sub@materials');
Route::get('/sub/news', 'Sub@news');
Route::get('/sub/contact_us', 'Sub@contact_us');


Route::get('/ey_admin/write_board_form', 'ey_admin@write_board_form');
Route::get('/ey_admin/login', 'ey_admin@ey_login');
Route::get('/ey_admin/acc', 'ey_admin@ey_acc');
Route::get('/ey_admin/beds', 'ey_admin@ey_press');
Route::get('/ey_admin/media', 'ey_admin@ey_media');
Route::get('/ey_admin/pcslider', 'ey_admin@ey_pcslider');
Route::get('/ey_admin/moslider', 'ey_admin@ey_moslider');
Route::get('/ey_admin/pcpopup', 'ey_admin@ey_pcpopup');
Route::get('/ey_admin/mopopup', 'ey_admin@ey_mopopup');
Route::get('/ey_admin/acc', 'ey_admin@ey_acc');

