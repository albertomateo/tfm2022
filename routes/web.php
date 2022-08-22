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
//  --------------------   Vistas de prueba ----------------------------

Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('/ejemplocomponente', function () {
    return view('ejemplocomponente');
});
Route::get('/welcome', function () {
    return view('welcome');
});

//  --------------------   Vistas de la aplicacion ----------------------------

Route::get('/', function () {
    return view('portada');
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





// ---------------------    APIS    ------------------

//  --------------------   Anuncios ----------------------------

//  Filtrado
Route::get('/anuncios/filtrar/{miparametro?}', [AnuncioController::class, 'anuncios.filtrar']);
//  5 rutas
Route::apiResource('/anuncios', AnuncioController::class)->only(['index']);
Route::apiResource('/anuncios', AnuncioController::class)->except(['index'])->middleware('auth');




//  --------------------   topis (Temas) ----------------------------

//  Filtrado
Route::get('/topics/filtrar/{miparametro?}', [TopicController::class, 'topics.filtrar']);
// Route::get('/topics/filtrar/{miparametro?}', [TopicController::class, 'filtrar']);

//  5 rutas 
Route::apiResource('/topics', TopicController::class)->only(['index']);
Route::apiResource('/topics', TopicController::class)->except(['index'])->middleware('auth');



//  --------------------   Enlaces ----------------------------
//  Filtrado
Route::get('/enlaces/filtrar/{miparametro?}', [App\Http\Controllers\EnlaceController::class, 'enlaces.filtrar']);
//  7 rutas funciona
Route::Resource('/enlaces', App\Http\Controllers\EnlaceController::class)->only(['index','show']);
Route::Resource('/enlaces', App\Http\Controllers\EnlaceController::class)->except(['index','show'])->middleware('auth');


//  --------------------   Informaciones ----------------------------
//  --- Se crea un CRUD solo en Backend 
Route::prefix('informaciones')->group(
    function () {
        Route::match(['get', 'post'],'/', [App\Http\Controllers\InformacionController::class, 'index'])->name('informaciones.index'); //listados
        Route::get('/create', [App\Http\Controllers\InformacionController::class, 'create'])->name('informaciones.create');  //insercion
        Route::get('/{informacion}/edit', [App\Http\Controllers\InformacionController::class, 'edit'])->name('informaciones.edit'); //edicion
        Route::post('/store', [App\Http\Controllers\InformacionController::class, 'store'])->name('informaciones.store');  //guardar
        Route::post('/{informacion}/update', [App\Http\Controllers\InformacionController::class, 'update'])->name('informaciones.update');  //actualizar uno
        Route::delete('/{informacion}/delete', [App\Http\Controllers\InformacionController::class, 'delete'])->name('informaciones.delete'); //borrar destrtoy uno
    }
);
// ---------------------   FIN DE LAS APIS ------------------


//  --------------------   BOTMAN ----------------------------

Route::get('/vistabotman', function () {
    return view('vistaBotman');
});

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


//  --------------------   LO CREA AUTOMATICAMENTE AL HACE php artisan make:auth----------------------------

Auth::routes();

// Con php artisan route:list -c Compruebo que esté todo correcto
