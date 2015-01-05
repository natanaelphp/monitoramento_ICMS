<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@goHome');
Route::get('home', 'HomeController@home');

Route::get('transacoes', 'TransactionsController@all');

Route::get('transacoes/nova', 'TransactionsController@create');
Route::post('transacoes/nova', 'TransactionsController@store');

Route::get('transacoes/alterar/{id}', 'TransactionsController@edit');
Route::post('transacoes/alterar/{id}', 'TransactionsController@update');

Route::get('transacoes/excluir/{id}', 'TransactionsController@delete');
Route::post('transacoes/excluir/{id}', 'TransactionsController@deletePost');


Route::get('relatorio', 'ReportController@form');
Route::post('relatorio', 'ReportController@show');