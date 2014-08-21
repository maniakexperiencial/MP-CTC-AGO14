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
Route::get('/', array('as' => 'root', function () {
    return View::make('index');
}));


/*-----------------------------------------------ADMINISTRATOR-------------------------------*/

Route::get("login", array('as' => 'login', function () {
    return View::make('admin.index');
}));

Route::get("signup", array('as' => 'signup', function () {
    return View::make('admin.signup');
}));

/*Route::post('signup', [

    'as' => 'signupUser_route',
    'uses' => 'UsersController@signup'

]);*/


/*-----------------------------------------------NORMAL---------------------*/
/*KIDS*/
Route::get("kids", array('as' => 'kids', function () {
    return View::make('kids.index');
}));
Route::get("kids/cuentos", array('as' => 'kids_cuentos', function () {
    return View::make('kids.cuentos');
}));

Route::get("kids/videos", array('as' => 'kids_videos', function () {
    return View::make('kids.videos');
}));

Route::get("kids/bases", array('as' => 'kids_bases', function () {
    return View::make('kids.bases');
}));

/*PAPAS*/
Route::get("papas", array('as' => 'papas', function () {
    return View::make('papas.index');
}));
Route::get("papas/historias", array('as' => 'papas_historias', function () {
    return View::make('papas.historias');
}));
Route::get("papas/bases", array('as' => 'papas_bases', function () {
    return View::make('papas.bases');
}));
Route::get("papas/videos", array('as' => 'papas_videos', function () {
    return View::make('papas.videos');
}));
Route::get('nueva', function () {
    Cache::flush();
});

/*DOCTORS*/
Route::get("doctores", array('as' => 'doctores', function () {
    return View::make('doctores.index');
}));
Route::get("doctores/historias", array('as' => 'doctores_historias', function () {
    return View::make('doctores.historias');
}));
Route::get("doctores/bases", array('as' => 'doctores_bases', function () {
    return View::make('doctores.bases');
}));
Route::get("doctores/videos", array('as' => 'doctores_videos', function () {
    return View::make('doctores.videos');
}));


/*PREMIACION*/
Route::get("premiacion", array('as' => 'premiacion', function () {
    return View::make('premiacion.index');
}));
Route::get("premiacion/ganadores", array('as' => 'premiacion_ganadores', function () {
    return View::make('premiacion.ganadores');
}));
Route::get("premiacion/galeria", array('as' => 'premiacion_galeria', function () {
    return View::make('premiacion.galeria');
}));
Route::get("premiacion/videos", array('as' => 'premiacion_videos', function () {
    return View::make('premiacion.videos');
}));
Route::get("premiacion/resumen", array('as' => 'premiacion_resumen', function () {
    return View::make('premiacion.resumen');
}));