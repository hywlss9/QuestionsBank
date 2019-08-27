<?php

Route::any('/session',function(){print_r(session()->all());});

Route::get('/','Front@index');
Route::get('/viewQuestion/{idx}','Question@view');
Route::get('/solveQuestion/{idx}','Question@solve');
Route::get('/ajax/solve','Ajax@solve');

Route::group(['middleware' => 'admin:1'], function () {
	Route::get('/admin','Admin');
	Route::get('/newQuestion','Question@insertReady');
	Route::post('/newQuestion','Question@new');
	Route::view('/newSubject','newSubject');
	Route::post('/newSubject','Subject@new');
	Route::get('/viewSubject','Subject@view');
	Route::get('/newNarrative','Question@narNewReady');
	Route::post('/newNarrative','Question@newNar');
});

Route::group(['middleware' => 'admin:0'], function () {
	Route::view('/login','login');
	Route::post('/login','User@login');
});