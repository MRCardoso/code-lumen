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
/*
 | ----------------------------------------------------------
 | Person
 | ----------------------------------------------------------
 */
$app->delete('contact/{id}/destroy', [
    'as' => 'person.destroy',
    'uses' => 'PersonController@destroy'
]);
$app->get('contact/create', [
    'as' => 'person.create',
    'uses' => 'PersonController@create'
]);
$app->post('contact', [
    'as' => 'person.store',
    'uses' => 'PersonController@store'
]);
$app->get('contact/{id}/edit', [
    'as' => 'person.edit',
    'uses' => 'PersonController@edit'
]);
$app->put('contact/{id}', [
    'as' => 'person.update',
    'uses' => 'PersonController@update'
]);
/*
 | ----------------------------------------------------------
 | Phone
 | ----------------------------------------------------------
 */
$app->get('person/{person_id}/phone/create', [
    'as' => 'phone.create',
    'uses' => 'PhoneController@create'
]);
$app->post('person/{person_id}/phone', [
    'as' => 'phone.store',
    'uses' => 'PhoneController@store'
]);
$app->get('person/{person_id}/phone/{id}/edit', [
    'as' => 'phone.edit',
    'uses' => 'PhoneController@edit'
]);
$app->put('person/{person_id}/phone/{id}', [
    'as' => 'phone.update',
    'uses' => 'PhoneController@update'
]);
$app->delete('person/{person_id}/phone/{id}/destroy', [
    'as' => 'phone.destroy',
    'uses' => 'PhoneController@destroy'
]);
/*
 | ----------------------------------------------------------
 | Email
 | ----------------------------------------------------------
 */
$app->get('person/{person_id}/email/create', [
    'as' => 'email.create',
    'uses' => 'EmailController@create'
]);
$app->post('person/{person_id}/email', [
    'as' => 'email.store',
    'uses' => 'EmailController@store'
]);
$app->get('person/{person_id}/email/{id}/edit', [
    'as' => 'email.edit',
    'uses' => 'EmailController@edit'
]);
$app->put('person/{person_id}/email/{id}', [
    'as' => 'email.update',
    'uses' => 'EmailController@update'
]);
$app->delete('person/{person_id}/email/{id}/destroy', [
    'as' => 'email.destroy',
    'uses' => 'EmailController@destroy'
]);
