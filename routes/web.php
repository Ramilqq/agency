<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(\App\Http\Controllers\TestController::class)->group(function() {
    Route::get('/test', 'test')->name('test');

    Route::get('/get-clients', 'clients')->name('get-clients');

    Route::get('/set-account-management', 'setAccountManagement')->name('set-account-management');

    //Route::get('/add-agens-clients', 'addAgencyClients')->name('add-agens-clients');
    Route::get('/get-agens-clients', 'getAgencyClients')->name('get-agens-clients');
});



Route::controller(\App\Http\Controllers\Web\CampaignController::class)->group(function() {
    Route::get('/campaign-get', 'index')->name('campaign-get');
    Route::get('/campaign-show/{id}', 'show')->name('campaign-show');
});

Route::controller(\App\Http\Controllers\Web\AdsController::class)->group(function() {
    Route::get('/ads-show/{id_campaign}/{adgroup_id}', 'show')->name('ads-show');
});

Route::controller(\App\Http\Controllers\Web\AgencyClientController::class)->group(function() {
    Route::get('/agens-client-get', 'index')->name('agens-clients-get');
    Route::get('/agens-client-create', 'create')->name('agens-clients-create');
    Route::post('/agens-client-store', 'store')->name('agens-clients-store');
});



