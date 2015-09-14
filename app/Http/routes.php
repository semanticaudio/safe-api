<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'SAFEController@index');
$app->get('/v1/', 'SAFEController@index');

// V1
$app->post('/v1/{plugin}/{format}', 'SAFEController@listUserData');
$app->get('/v1/{plugin}/term-list.json', 'SAFEController@termList');
$app->get('/v1/{plugin}/{datatype}/{id}/{format}', 'SAFEController@getDatafromID');
