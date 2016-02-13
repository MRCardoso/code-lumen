<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', [
    'as' => 'notebook.index',
    'uses' => 'NotebookController@index'
]);
$app->get('/{letter}', [
    'as' => 'notebook.letter',
    'uses' => 'NotebookController@index'
]);
$app->post('/search', [
    'as' => 'notebook.search',
    'uses' => 'NotebookController@search'
]);
$app->delete('contact/{id}/destroy', [
    'as' => 'person.destroy',
    'uses' => 'PersonController@destroy'
]);
$app->delete('phone/{id}/destroy', [
    'as' => 'phone.destroy',
    'uses' => 'PhoneController@destroy'
]);
