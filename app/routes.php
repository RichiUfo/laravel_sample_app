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

Route::get(   'sign-in',                  [ 'uses' => 'SessionsController@create',
                                            'as' => 'sign-in' ]             );

Route::get(   'sign-in/hybrid/{action?}', [ 'uses' => 'Sessions\HybridController@create',
                                            'as' => 'hybridauth' ]);

Route::get(   'sign-up', 'RegistrationsController@create'  );

Route::group(['before' => 'csrf'], function() {
  Route::post(  'sign-in',  'SessionsController@store'       );
  Route::post(  'sign-up',  'RegistrationsController@store'   );
});

Route::get(   'sign-out', 'SessionsController@destroy'      );


Route::get('/', ['before' => 'auth',
                 'uses' => 'HomeController@index']);

Route::any('{all}', function($uri){
  return Redirect::to('sign-in');
})->where('all', '.*');
