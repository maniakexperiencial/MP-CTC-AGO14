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


Route::get('/', ['as' => 'root', 'uses' => 'HomeController@index']);
////////////////////////////////////////////////////////////////////////ACTIVATE USER///////////////////////////////
Route::get('activate/{code}',['as' => 'account_activate','uses' => 'UsersController@getActivate']);

Route::get('register_success', ['as' => 'register_success', 'uses' => 'UsersController@register_success']);
Route::get('register_confirmed', ['as' => 'register_confirmed', 'uses' => 'UsersController@register_confirmed']);
/*---------------------------------------------------------------------------TIPOS DE USUARIOS------------------------------------------------------------------*/

Route::get('redirect', ['before'=>'auth','as' => 'redirect', 'uses' => 'UsersController@redirect_user']);


Route::group(array("before" => "auth"), function () {

    /*-----------------------------ADMINISTRADOR---------------------------------*/
    Route::group(array("before" => "admin_filter"), function () {

        Route::get('dashboard_admin', array("as" => "dashboard_admin", "uses" => "AdminController@index"));
        Route::get('cuentos_admin', array("as" => "cuentos_admin", "uses" => "AdminController@cuentos"));
        Route::get('historias_admin', array("as" => "historias_admin", "uses" => "AdminController@historias"));
        Route::get('preselect_admin', array("as" => "preselect_admin", "uses" => "AdminController@preselect"));
        Route::get('finalist_admin', array("as" => "finalist_admin", "uses" => "AdminController@finalist"));
        Route::get('report_admin', array("as" => "report_admin", "uses" => "AdminController@report"));

            /*----ADD JUEZ---*/
        Route::get('dashboard_admin/new_juez', array("as" => "new_juez", "uses" => "AdminController@new_juez_index"));
        Route::post('dashboard_admin/new_juez', ['as' => 'create_juez_route', 'uses' => 'AdminController@new_juez']);
            /*----ADD CUENTO---*/
        Route::get('dashboard_admin/new_cuento', array("as" => "new_cuento", "uses" => "AdminController@new_cuento_index"));
        Route::post('dashboard_admin/new_cuento', ['as' => 'create_cuento_route', 'uses' => 'AdminController@new_cuento']);
        /*--DELETE USER--*/
        Route::post('dashboard_admin/delete_user', array("as" => "delete_user", "uses" => "AdminController@delete_user"));
        /*----EDIT USER---*/
             /*EDIT ADMIN*/
        Route::get('dashboard_admin/edit_admin/{id_user}', array("as" => "edit_admin", "uses" => "AdminController@edit_admin_index"));
        Route::post('dashboard_admin/edit_admin/{id_user}', ['as' => 'edit_admin_route', 'uses' => 'AdminController@edit_admin']);
            /*EDIT JUEZ*/
              Route::get('dashboard_admin/edit_juez/{id_user}', array("as" => "edit_juez", "uses" => "AdminController@edit_juez_index"));
              Route::post('dashboard_admin/edit_juez/{id_user}', ['as' => 'edit_juez_route', 'uses' => 'AdminController@edit_juez']);
            /*EDIT PD*/
                Route::get('dashboard_admin/edit_pd/{id_user}', array("as" => "edit_pd", "uses" => "AdminController@edit_pd_index"));
                Route::post('dashboard_admin/edit_pd/{id_user}', ['as' => 'edit_pd_route', 'uses' => 'AdminController@edit_pd']);
            /*EDIT CUENTO*/
             Route::get('dashboard_admin/cuento/edit/{idcuento}', array("as" => "editcuento", "uses" => "AdminController@edit_cuento_index"));
             Route::post('dashboard_admin/cuento/edit/{idcuento}', array("as" => "edit_cuentoRoute", "uses" => "AdminController@edit_cuento"));
            /*DELETE CUENTO*/
                 Route::post('dashboard_admin/delete_cuento', ['as' => 'delete_cuento', 'uses' => 'AdminController@delete_cuento']);


        /*---VER DETALLE DE PRESELECCION*/
        Route::get('dashboard_admin/preselect/{type}/{document_id}', array("as" => "detalle_preselect", "uses" => "AdminController@detalle_preselect"));

        /*DELETE HISTORIA*/
        Route::post('dashboard_admin/delete_historia', ['as' => 'delete_historia', 'uses' => 'AdminController@delete_historia']);
        /*EDIT HISTORIA*/
        Route::get('dashboard_admin/historia/edit/{idhistoria}', array("as" => "edithistoria", "uses" => "AdminController@edit_historia_index"));
        Route::post('dashboard_admin/historia/edit/{idcuento}', array("as" => "edit_historiaRoute", "uses" => "AdminController@edit_historia"));

    });


    /*-----------------------------JUEZ---------------------------------*/
    Route::group(array("before" => "juez_filter"), function () {
        Route::get('dashboard_juez', array("as" => "dashboard_juez", "uses" => "AcJuezController@index"));
        Route::get('dashboard_juez/historias', array("as" => "historia_juez", "uses" => "AcJuezController@historia"));
        Route::get('dashboard_juez/preselect_juez', array("as" => "preselect_juez", "uses" => "AcJuezController@preselect"));
        Route::get('dashboard_juez/finalist_juez', array("as" => "finalist_juez", "uses" => "AcJuezController@finalist"));

                   /*----------PRESELECT-------------*/
        Route::post('dashboard_juez/preselectAdd', array("as" => "preselectAdd", "uses" => "AcJuezController@preselectAdd"));
        Route::post('dashboard_juez/preselectDelete', array("as" => "preselectDelete", "uses" => "AcJuezController@preselectDelete"));

                /*-----------------EVALUAR------*/

        Route::post('dashboard_juez/evaluate/', array("as" => "evaluate", "uses" => "AcJuezController@evaluate"));


    });



    /*-----------------------------PADRES Y DOCTORES---------------------------------*/
    Route::group(array("before" => "pd_filter"), function () {
        Route::get('dashboard_pd', array("as" => "dashboard_pd", "uses" => "AcPdController@index"));

        /*----ADD HISTORIA---*/
        Route::get('dashboard_pd/new_historia', array("as" => "new_historia", "uses" => "AcPdController@new_historia_index"));
        Route::post('dashboard_pd/new_historia', ['as' => 'create_historia_route', 'uses' => 'AcPdController@new_historia']);

        /*DELETE HISTORIA*/
        Route::post('dashboard_pd/delete_historia', ['as' => 'delete_historiaPd', 'uses' => 'AcPdController@delete_historia']);
        /*EDIT HISTORIA*/
        Route::get('dashboard_pd/historia/edit/{idhistoria}', array("as" => "edithistoriaPd", "uses" => "AcPdController@edit_historia_index"));
        Route::post('dashboard_pdn/historia/edit/{idcuento}', array("as" => "edit_historiaRoutePd", "uses" => "AcPdController@edit_historia"));


    });





    /*--------------------------------------------------------------------END TIPOS DE USUARIOS------------------------------------------------------------------------*/

});

Route::get('logout', ['before'=>'auth','as' => 'logout', 'uses' => 'UsersController@log_out']);



/*Route::get("login", array('as' => 'login', function () {
    return View::make('admin.index');
}));*/




/*---------------------LOGIN AND SIGNUP---------------------*/
Route::get('signup', ['as' => 'signup', 'uses' => 'UsersController@signup_index']);
Route::get('login', ['as' => 'loginUser_route', 'uses' => 'UsersController@login_index']);

Route::post('login', ['as' => 'loginUser_route', 'uses' => 'UsersController@login']);
Route::post('signup', ['as' => 'signupUser_route', 'uses' => 'UsersController@signup']);




/*-----------------------------------------------NORMAL---------------------*/

Route::post('kids/like',['as'=>'likeSystem','uses'=>'UsersController@likes']);
/*KIDS*/
Route::get('kids', ['as' => 'kids', 'uses' => 'KidsController@index']);
Route::get('kids/cuentos', ['as' => 'kids_cuentos', 'uses' => 'KidsController@cuentos']);
Route::get('kids/videos', ['as' => 'kids_videos', 'uses' => 'KidsController@videos']);
Route::get('kids/bases', ['as' => 'kids_bases', 'uses' => 'KidsController@bases']);

/*PAPAS*/
Route::get('papas', ['as' => 'papas', 'uses' => 'PapasController@index']);
Route::get('papas/historias', ['as' => 'papas_historias', 'uses' => 'PapasController@historias']);
Route::get('papas/videos', ['as' => 'papas_videos', 'uses' => 'PapasController@videos']);
Route::get('papas/bases', ['as' => 'papas_bases', 'uses' => 'PapasController@bases']);

/*DOCTORS*/
Route::get('doctores', ['as' => 'doctores', 'uses' => 'DoctoresController@index']);
Route::get('doctores', ['as' => 'doctores', 'uses' => 'DoctoresController@index']);
Route::get('doctores/historias', ['as' => 'doctores_historias', 'uses' => 'DoctoresController@historias']);
Route::get('doctores/bases', ['as' => 'doctores_bases', 'uses' => 'DoctoresController@bases']);
Route::get('doctores/videos', ['as' => 'doctores_videos', 'uses' => 'DoctoresController@videos']);

/*PREMIACION*/
Route::get('premiacion', ['as' => 'premiacion', 'uses' => 'PremiacionController@index']);
Route::get('premiacion/ganadores', ['as' => 'premiacion_ganadores', 'uses' => 'PremiacionController@ganadores']);
Route::get('premiacion/galeria', ['as' => 'premiacion_galeria', 'uses' => 'PremiacionController@galeria']);
Route::get('premiacion/videos', ['as' => 'premiacion_videos', 'uses' => 'PremiacionController@videos']);
Route::get('premiacion/resumen', ['as' => 'premiacion_resumen', 'uses' => 'PremiacionController@resumen']);
