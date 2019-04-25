<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:api'],function(){
	$this->get('/',['as'=>'api','uses'=>'ApiController@index']);
	$this->get('find/{id?}',['as'=>'find','uses'=>'ApiController@find']);
	$this->post('create',['as'=>'create','uses'=>'ApiController@store']);
	$this->any('update/{id?}',['as'=>'update','uses'=>'ApiController@update']);
	$this->any('delete/{id?}',['as'=>'delete','uses'=>'ApiController@destroy']);
});
// Route::group(['as'=>'api','prefix'=>''],function (){
// 	$this->get('/',['as'=>'api','uses'=>'ApiController@index']);
// 	$this->get('find/{id?}',['as'=>'find','uses'=>'ApiController@find']);
// 	$this->post('create',['as'=>'create','uses'=>'ApiController@store']);
// 	$this->any('update/{id?}',['as'=>'update','uses'=>'ApiController@update']);
// 	$this->any('delete/{id?}',['as'=>'delete','uses'=>'ApiController@destroy']);
// });
