<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search/filter', 'FilterController@filterCheckbox')->name('search_filter'); // FILTRO CHECKBOX
Route::get('/stats_apt', 'ApartmentsController@statsResults')->name('stats_apt'); // AJAX PER CHARTJS
Route::get('/messages_apt', 'ApartmentsController@messagesApt')->name('messages_apt');  // AJAX PER STAMPA MESSAGGI
Route::get('/payment/process', 'PaymentsController@process')->name('payment_process'); // ROTTA PER ESEGUIRE I PAGAMENTI TRAMITE BRAINTREE
Route::post('/preferences_apt','ApartmentsController@savePref')->name('preferences');
Route::post('/preferences_apt/remove','ApartmentsController@removePref')->name('preferences_remove');
