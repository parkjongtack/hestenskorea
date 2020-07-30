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

Route::get('/sub/acc/pillows', 'Sub@acc');
Route::get('/sub/acc/downqults', 'Sub@acc');
Route::get('/sub/acc/bedlinen', 'Sub@acc');
Route::get('/sub/acc/headborards', 'Sub@acc');
Route::get('/sub/acc/skirts', 'Sub@acc');
Route::get('/sub/acc/legs', 'Sub@acc');
Route::get('/sub/acc/covers', 'Sub@acc');
Route::get('/sub/acc/personal', 'Sub@acc');
Route::get('/sub/acc/collection', 'Sub@acc');
Route::get('/sub/beds', 'Sub@beds');
Route::get('/sub/beds/sub', 'Sub@beds_sub');
Route::get('/sub/contact_us', 'Sub@contact_us');
Route::get('/sub/heritage01', 'Sub@heritage01');
Route::get('/sub/heritage02', 'Sub@heritage02');
Route::get('/sub/heritage03', 'Sub@heritage03');
Route::get('/sub/materials', 'Sub@materials');
Route::get('/sub/media_view', 'Sub@media_view');
Route::get('/sub/notice', 'Sub@news');
Route::get('/sub/press', 'Sub@news');
Route::get('/sub/media', 'Sub@news');
Route::get('/sub/contact_us', 'Sub@contact_us');

Route::get('/ey_admin/priority_change', 'Ey_admin@priority_change');
//Route::get('/ey_admin/acc', 'Ey_admin@ey_acc');
Route::post('/file_upload', 'Ey_admin@file_upload');

Route::get('/ey_admin/acc/write_board_form', 'Ey_admin@write_board_form');

Route::get('/ey_admin/login', 'Ey_admin@ey_login');
Route::post('/ey_admin/login_action', 'Ey_admin@ey_login_action');

Route::get('/ey_admin/pcslider', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/pcslider/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/pcslider/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/pcslider/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/pcslider/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/popup', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/popup/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/popup/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/popup/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/popup/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/press', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/press/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/press/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/press/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/press/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/notice', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/notice/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/notice/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/notice/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/notice/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/beds', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/beds/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/beds/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/beds/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/beds/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/beds/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/acc', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/acc/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/acc/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/acc/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/acc/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/acc/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/media', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/media/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/media/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/media/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/media/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/media/write_board_form/modify', 'Ey_admin@write_board_form');

//Route::get('/ey_admin/beds', 'Ey_admin@ey_press');
//Route::get('/ey_admin/media', 'Ey_admin@ey_media');

Route::get('/ey_admin/moslider', 'Ey_admin@ey_moslider');
Route::get('/ey_admin/pcpopup', 'Ey_admin@ey_pcpopup');
Route::get('/ey_admin/mopopup', 'Ey_admin@ey_mopopup');
//Route::get('/ey_admin/acc', 'Ey_admin@ey_acc');
Route::get('/ey_admin/logout', 'Ey_admin@ey_logout');
