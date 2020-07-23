<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group([
  'middleware' => 'auth',
], function(){

  // CRUD
  Route::get('/create', 'ApartmentsController@create')->name('create'); // ROTTA DELLA CREAZIONE APPARTAMENTO CON UTENTE VERIFICATO
  Route::post('/store', 'ApartmentsController@store')->name('store_apartment'); // ROTTA DELL'UPLOAD DATI CREATI SU DATABASE
  Route::get('/edit/{id}', 'ApartmentsController@edit')->name('edit'); // ROTTA DELL'EDITING APPARTAMENTO
  Route::post('/update/{id}', 'ApartmentsController@update')->name('update'); // ROTTA DELL'UPLOAD DATI MODIFICATI APPARTAMENTO
  Route::get('/delete/{id}', 'ApartmentsController@delete')->name('delete'); // ROTTA PER LA CANCELLAZIONE DAL DATABASE DELL'APPARTAMENTO SELEZIONATO

  // VIEW
  Route::get('/myApartments', 'ApartmentsController@myApartments')->name('my_apartments'); // ROTTA DELLA VISTA APPARTAMENTI PROPRIETARI DELL'UTENTE
  Route::get('/stats/{id}', 'ApartmentsController@stats')->name('stats'); // ROTTA PER VISUALIZZARE LE STATISTICHE DELL'APPARTAMENTO
  Route::get('/show_msg/{id}', 'ApartmentsController@showMsg')->name('show_msg'); // ROTTA PER VISUALIZZARE I MESSAGGI RICEVUTI AD UN SINGOLO APPARTAMENTO
  Route::get('/delete_image/{id}', 'PhotosController@delete')->name('delete_img'); // ROTTA PER LA CANCELLAZIONE DELLE FOTO SELEZIONATE RELATIVE ALL'APPARTAMENTO SELEZIONATO
  Route::get('/sponsor_apt/{id}', 'ApartmentsController@sponsorApt')->name('sponsor'); // ROTTA PER SPONSORIZZARE IL PROPRIO APPARTAMENTO
  Route::get('/my_preferences', 'ApartmentsController@showPref')->name('my_preferences'); // ROTTA PER VISUALIZZARE APPARTAMENTI PREFERITI
});

// VIEW SENZA AUTENTICAZIONE
Route::get('/', 'ApartmentsController@index')->name('home'); // ROTTA DELLA HOMEPAGE
Route::get('/search', 'ApartmentsController@search')->name('search'); // ROTTA DEI RISULTATI DI RICERCA
Route::get('/show/{id}', 'ApartmentsController@show')->name('show'); // ROTTA DELLA VISTA DETTAGLI APPARTAMENTO
Route::post('/informations_message/{id}', 'ApartmentsController@saveInformations')->name('informations'); // ROTTA I MESSAGGI INVIATI DA SALVARE NEL DATABASE
Route::get('/chi_siamo', function () {
    return view('chi_siamo');
})->name('chi_siamo');