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
Route::get('/',array('as'=>'root', function()
{
    return View::make('index');
}));

Route::get("kids",array('as'=>'kids',function(){
    return View::make('kids.index');
}));
Route::get("kids/cuentos",array('as'=>'kids_cuentos',function(){
    return View::make('kids.cuentos');
}));

Route::get("kids/videos",array('as'=>'kids_videos',function(){
    return View::make('kids.videos');
}));

Route::get("kids/bases",array('as'=>'kids_bases',function(){
    return View::make('kids.bases');
}));

