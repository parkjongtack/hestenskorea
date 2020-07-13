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


Route::get('/ey_admin/write_board_form', 'Ey_admin@write_board_form');

Route::get('/ey_admin/login', 'Ey_admin@ey_login');
Route::post('/ey_admin/login_action', 'Ey_admin@ey_login_action');

Route::get('/ey_admin/acc', 'Ey_admin@ey_acc');
Route::get('/ey_admin/beds', 'Ey_admin@ey_press');
Route::get('/ey_admin/media', 'Ey_admin@ey_media');
Route::get('/ey_admin/pcslider', 'Ey_admin@ey_pcslider');
Route::get('/ey_admin/moslider', 'Ey_admin@ey_moslider');
Route::get('/ey_admin/pcpopup', 'Ey_admin@ey_pcpopup');
Route::get('/ey_admin/mopopup', 'Ey_admin@ey_mopopup');
Route::get('/ey_admin/acc', 'Ey_admin@ey_acc');

