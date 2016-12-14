<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PublicController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/remas/importar', 'RemaController@importar');
Route::get('/remfc/importar', 'RemfcController@importar');
Route::get('/remli/importar', 'RemliController@importar');

Route:: get('/remas/buscarCampanias/{codigo}','RemaController@buscarCampanias');



Route::group(['prefix'=>'admin'],function(){

    Route::get('/remas','RemaController@index');
    Route::get('/campaniasrema/{rema}','RemaController@campanias');
    Route::get('/createmedicion/{rema_id}','RemaController@medicionCreate');
    Route::post('/medicionupdate','RemaController@medicionupdate');
    Route::post('/medicionstore','RemaController@medicionstore');
    Route::get('/remas/exportar','RemaController@exportar');




    Route::get('/remfc','RemfcController@index');
    Route::get('/campanias_remfc/{remfc}','RemfcController@campanias');
    Route::get('/createmedicion_remfc/{remfc_id}','RemfcController@medicionCreate');
    Route::post('/medicionupdate_remfc','RemfcController@medicionupdate');
    Route::post('/medicionstore_remfc','RemfcController@medicionstore');

    Route::get('/remli','RemliController@index');
    Route::get('/campanias_remli/{remli}','RemliController@campanias');
    Route::get('/createmedicion_remli/{remli_id}','RemliController@medicionCreate');
    Route::post('/medicionupdate_remli','RemliController@medicionupdate');
    Route::post('/medicionstore_remli','RemliController@medicionstore');




    Route::get('/tdps','TdpsController@index');
    Route::post('/tdps/store','TdpsController@store');
    Route::post('/tdps/update','TdpsController@update');
    Route::get('/tdps/puntosmonitoreo/{tdps}','TdpsController@puntosMonitoreo');
    Route::get('/tdps/destroy/{tdps}','TdpsController@destroy');

    Route::get('/cuencacoipasa','TdpsController@indexCuencaCoipasa');
    Route::post('/zonashidrologicas/store','TdpsMonitoreoController@storeZonasHidrologicas');
    Route::post('/zonashidrologicas/update','TdpsMonitoreoController@updateZonasHidrologicas');
    Route::get('/zonashidrologicas/puntosmonitoreo/{zonashidrologicas}','TdpsMonitoreoController@puntosMonitoreo');
    Route::get('/zonashidrologicas/destroy/{tdps}','TdpsMonitoreoController@destroy');


    Route::get('/zonashidrologicas','TdpsMonitoreoController@indexZonasHidrologicas');
    Route::post('/zonashidrologicas/store','TdpsMonitoreoController@storeZonasHidrologicas');
    Route::post('/zonashidrologicas/update','TdpsMonitoreoController@updateZonasHidrologicas');
    Route::get('/zonashidrologicas/puntosmonitoreo/{zonashidrologicas}','TdpsMonitoreoController@puntosMonitoreo');
    Route::get('/zonashidrologicas/destroy/{tdps}','TdpsMonitoreoController@destroy');

    Route::get('/cuencapoopo/escala50000','TdpsMonitoreoController@indexCuencaPoopo50000');
    Route::get('/cuencapoopo/mapas50000/{subcuenca}','MapaPuntoController@cuencaPoopoMapas50000');

    Route::get('/cuencapoopo/escala1000000','MapaPuntoController@indexCuencaPoopo1000000');
    Route::post('/cuencapoopo/escala1000000/store','MapaPuntoController@storeCuencaPoopo1000000');
    Route::post('/cuencapoopo/escala1000000/update','MapaPuntoController@updateCuencaPoopo1000000');
    Route::get('/cuencapoopo/escala1000000/destroy/{mapa}','MapaPuntoController@destroyCuencaPoopo1000000');
    Route::get('/cuencapoopo/mapas50000/{subcuenca}','MapaPuntoController@cuencaPoopoMapas50000');

    Route::post('/cuencapoopo/storesubcuencas','TdpsMonitoreoController@storeSubcuencasPoopo50000');
    Route::post('/cuencapoopo/storemapaSubcuenca50000','TdpsMonitoreoController@storeSubcuencasPoopo50000');
    Route::post('/cuencapoopo/updateMapa','TdpsController@updateMapaSubcuencaPoopo');
    Route::post('/cuencapoopo/updateMapaSubcuenca','TdpsController@updateMapaSubcuenca');


    Route::get('/cuencacoipasa/escala50000','TdpsMonitoreoController@indexCuencaCoipasa50000');
    Route::post('/cuencacoipasa/escala50000/update','MapaPuntoController@updateCuencaCoipasa50000');
    Route::get('/cuencacoipasa/mapas50000/{subcuenca}','MapaPuntoController@cuencaCoipasaMapas50000');
    Route::post('/cuencacoipasa/storesubcuencas','TdpsMonitoreoController@storeSubcuencasCoipasa50000');



    Route::get('/cuencacoipasa/escala1000000','MapaPuntoController@indexCuencaCoipasa1000000');
    Route::post('/cuencacoipasa/escala1000000/store','MapaPuntoController@storeCuencaCoipasa1000000');
    Route::post('/cuencacoipasa/escala1000000/update','MapaPuntoController@updateCuencaCoipasa1000000');
    Route::get('/cuencacoipasa/escala1000000/destroy/{mapa}','MapaPuntoController@destroyCuencaCoipasa1000000');


    Route::post('/monitoreo/store','TdpsMonitoreoController@store');
    Route::post('/monitoreo/update','TdpsMonitoreoController@update');
    Route::get('/monitoreo/mapas_monitoreo/{monitoreo}','TdpsMonitoreoController@mapasMonitoreo');
    Route::get('/monitoreo/destroy/{monitoreo}','TdpsMonitoreoController@destroy');


    Route::post('/mapaspuntos/store','MapaPuntoController@store');
    Route::post('/mapaspuntos/update','MapaPuntoController@update');
    Route::get('/mapaspuntos/download/{mapapunto}','MapaPuntoController@download');
    Route::get('/mapaspuntos/destroy/{mapa}','MapaPuntoController@destroy');



    Route::get('/cuencas','TdpsController@indexCuenca');
    Route::get('/cuencas/destroy/{cuenca}','TdpsController@destroyCuenca');
    Route::post('/cuencas/store','TdpsController@storeCuenca');
    Route::post('/cuencas/update','TdpsController@updateCuenca');
    Route::get('/cuencas/subcuencas/{tdps}','TdpsController@subCuencas');


    Route::post('/subcuencas/store','TdpsMonitoreoController@storeSubCuenca');
    Route::post('/subcuencas/update','TdpsMonitoreoController@updateSubCuenca');
    Route::get('/subcuencas/mapas_subcuencas/{monitoreo}','TdpsMonitoreoController@mapasSubcuencas');
    Route::get('/subcuencas/destroy/{subcuenca}','TdpsMonitoreoController@destroySubcuenca');

    Route::get('/subcuencas/mapas_subcuencas/destroy/{mapa}','MapaPuntoController@destroyMapaSubcuenca');
    Route::get('/subcuencas/mapas_subcuencas/download/{mapa}','MapaPuntoController@destroyMapaSubcuenca');
    Route::post('/subcuencas/mapas_subcuencas/store','MapaPuntoController@storeMapaSubcuenca');
    Route::post('/subcuencas/mapas_subcuencas/update','MapaPuntoController@updateMapaSubcuenca');


});

