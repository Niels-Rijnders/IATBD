<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth','admin'])->group(function() {
    Route::get('/animal/create', [App\Http\Controllers\AnimalController::class, 'create']);
    Route::post('/animal', [App\Http\Controllers\AnimalController::class, 'store']);

    Route::get('/owners', [\App\Http\Controllers\UserController::class, 'ownerIndex'])->middleware(['auth']);
    Route::get('/owner/{id}', [\App\Http\Controllers\UserController::class, 'ownerShow']);
    Route::get('/owner/{id}/animals', [\App\Http\Controllers\UserController::class, 'ownerAnimals']);
});

Route::middleware(['auth', 'banned'])->group(function(){
    Route::get('/', [\App\Http\Controllers\AnimalController::class,'index']);
});

Route::middleware(['auth', 'oppasser', 'banned'])->group(function(){
    Route::get('/sitters', [\App\Http\Controllers\UserController::class, 'sitterIndex']);
    Route::get('/sitter/{id}', [\App\Http\Controllers\UserController::class, 'sitterShow']);
    Route::get('/animal', [\App\Http\Controllers\AnimalController::class,'word_opgepast']);
    Route::get('/animal/{id}', [\App\Http\Controllers\AnimalController::class,'show']);
    Route::get('/application', [\App\Http\Controllers\UserController::class, 'createApplication']);
    Route::post('/application', [\App\Http\Controllers\UserController::class, 'storeApplication']);
});

Route::middleware(['auth', 'eigenaar', 'banned'])->group(function(){

    Route::get('/animal', [\App\Http\Controllers\AnimalController::class,'index'])->middleware(['auth']);
    Route::get('/animals/delete', [\App\Http\Controllers\AnimalController::class, 'delete']);
    Route::get('/animal/{id}', [\App\Http\Controllers\AnimalController::class,'show']);
    Route::get('/owners', [\App\Http\Controllers\UserController::class, 'ownerIndex']);
    Route::get('/owner/{id}', [\App\Http\Controllers\UserController::class, 'ownerShow']);
    Route::get('/owner/{id}/animals', [\App\Http\Controllers\UserController::class, 'ownerAnimals']);
    Route::get('/animal/create', [App\Http\Controllers\AnimalController::class, 'create']);
    Route::post('/animal', [App\Http\Controllers\AnimalController::class, 'store']);
    Route::post('/owners', [\App\Http\Controllers\AnimalController::class, 'destroy']);
    Route::get('/application/{id}', [\App\Http\Controllers\UserController::class, 'createAccept']);
    Route::post('/application/{id}', [\App\Http\Controllers\UserController::class, 'updateAccept']);
    Route::get('/review/{id}', [\App\Http\Controllers\UserController::class, 'createReview']);
    Route::post('/review/{id}', [\App\Http\Controllers\UserController::class, 'storeReview']);  
});

// Route::middleware(['auth', 'eigenaar'])->group(function() {
//     Route::get('/animal', [\App\Http\Controllers\AnimalController::class,'index'])->middleware(['auth']);
//     Route::get('/animal/{id}', [\App\Http\Controllers\AnimalController::class,'show']);
//     Route::get('/', [\App\Http\Controllers\AnimalController::class,'index']);  
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
