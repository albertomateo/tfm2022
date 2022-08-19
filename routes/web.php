<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BotManController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ejemplocomponente', function () {
    return view('ejemplocomponente');
});
Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('portada');
});
Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/eressan', function () {
    return view('eressan');
});
Route::get('/catastro', function () {
    return view('catastro');
});
Route::get('/rentas', function () {
    return view('rentas');
});
Route::get('/diputacion', function () {
    return view('diputacion');
});



Route::get('/comollegar', function () {
    return view('comollegar');
});

Route::get('/vistaAnuncios', function () {
    return view('vistaAnuncios');
});

Route::get('/vistaTopics', function () {
    return view('vistaTopics');
});

Route::get('/vistaEnlaces', function () {
    return view('vistaEnlaces');
});



// Route::get('topicsrentas', [TopicController::class, 'index']);



Route::get('/anuncios/filtrar/{miparametro?}', [AnuncioController::class, 'anuncios.filtrar']);
Route::get('/topics/filtrar/{miparametro?}', [AnuncioController::class, 'topics.filtrar']);

//Route::Resource('/anuncios',AnuncioController::class);  7 rutas funciona
Route::apiResource('/anuncios', AnuncioController::class)->only(['index']);
Route::apiResource('/anuncios', AnuncioController::class)->except(['index'])->middleware('auth');

Route::get('/topics/filtrar/{miparametro?}', [TopicController::class, 'filtrar']);

//Route::Resource('/topics',TopicController::class);  7 rutas funciona
Route::apiResource('/topics', TopicController::class)->only(['index']);
Route::apiResource('/topics', TopicController::class)->except(['index'])->middleware('auth');

//Route::Resource('/enlaces',EnlaceController::class);  7 rutas funciona
Route::apiResource('/enlaces', App\Http\Controllers\EnlaceController::class)->only(['index']);
Route::apiResource('/enlaces', App\Http\Controllers\EnlaceController::class)->except(['index'])->middleware('auth');


Route::prefix('informaciones')->group(
    function () {


        Route::match(['get', 'post'],'/', [App\Http\Controllers\InformacionController::class, 'index'])->name('informaciones.index');
        Route::get('/create', [App\Http\Controllers\InformacionController::class, 'create'])->name('informaciones.create');
        Route::get('/{informacion}/edit', [App\Http\Controllers\InformacionController::class, 'edit'])->name('informaciones.edit');
        Route::post('/store', [App\Http\Controllers\InformacionController::class, 'store'])->name('informaciones.store');
        Route::post('/{informacion}/update', [App\Http\Controllers\InformacionController::class, 'update'])->name('informaciones.update');
        Route::delete('/{informacion}/delete', [App\Http\Controllers\InformacionController::class, 'delete'])->name('informaciones.delete');
        // Route::match(['get', 'post'], '/', 'App\Http\Controllers\InformacionController@index')->name('informacion.index'); //listados
        // Route::get('/create', 'App\Http\Controllers\InformacionController@create')->name('informacion.create'); //creación
        // Route::post('/store', 'App\Http\Controllers\InformacionController@store')->name('informacion.store'); //guardado
        // Route::get('/{informacion}/edit', 'App\Http\Controllers\InformacionController@edit')->name('informacion.edit'); //edicion
        // Route::post('/{informacion}/update', 'App\Http\Controllers\InformacionController@update')->name('informacion.update'); //edicion
        // Route::delete('/{informacion}/delete', 'App\Http\Controllers\InformacionController@delete')->name('informacion.delete'); //borrado destroy
        
    }
);



Route::get('/vistabotman', function () {
    return view('vistaBotman');
});

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);



Auth::routes();
