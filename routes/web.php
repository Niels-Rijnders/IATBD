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
    Route::get('/sushi/create', [App\Http\Controllers\SushiController::class, 'create']);
    Route::post('/sushi', [App\Http\Controllers\SushiController::class, 'store']);

    Route::get('/owners', [\App\Http\Controllers\UserController::class, 'ownerIndex'])->middleware(['auth']);
    Route::get('/owner/{id}', [\App\Http\Controllers\UserController::class, 'ownerShow']);
    Route::get('/owner/{id}/animals', [\App\Http\Controllers\UserController::class, 'ownerAnimals']);
});

Route::middleware(['auth', 'banned'])->group(function(){
    Route::get('/', [\App\Http\Controllers\SushiController::class,'index']);
});

Route::middleware(['auth', 'oppasser', 'banned'])->group(function(){
    Route::get('/sitters', [\App\Http\Controllers\UserController::class, 'sitterIndex']);
    Route::get('/sitter/{id}', [\App\Http\Controllers\UserController::class, 'sitterShow']);
    Route::get('/sushi', [\App\Http\Controllers\SushiController::class,'word_opgepast']);
    Route::get('/sushi/{id}', [\App\Http\Controllers\SushiController::class,'show']);
    Route::get('/application', [\App\Http\Controllers\UserController::class, 'createApplication']);
    Route::post('/application', [\App\Http\Controllers\UserController::class, 'storeApplication']);
});

Route::middleware(['auth', 'eigenaar', 'banned'])->group(function(){

    Route::get('/sushi', [\App\Http\Controllers\SushiController::class,'index'])->middleware(['auth']);
    Route::get('/sushi/{id}', [\App\Http\Controllers\SushiController::class,'show']);
    Route::get('/owners', [\App\Http\Controllers\UserController::class, 'ownerIndex']);
    Route::get('/owner/{id}', [\App\Http\Controllers\UserController::class, 'ownerShow']);
    Route::get('/owner/{id}/animals', [\App\Http\Controllers\UserController::class, 'ownerAnimals']);
    Route::get('/sushi/create', [App\Http\Controllers\SushiController::class, 'create']);
    Route::post('/sushi', [App\Http\Controllers\SushiController::class, 'store']);
    Route::get('/sushi/delete', [\App\Http\Controllers\SushiController::class, 'delete']);
    Route::post('/owners', [\App\Http\Controllers\SushiController::class, 'destroy']);
    Route::get('/application/{id}', [\App\Http\Controllers\UserController::class, 'createAccept']);
    Route::post('/application/{id}', [\App\Http\Controllers\UserController::class, 'updateAccept']);
    Route::get('/review/{id}', [\App\Http\Controllers\UserController::class, 'createReview']);
    Route::post('/review/{id}', [\App\Http\Controllers\UserController::class, 'storeReview']);  
});

// Route::middleware(['auth', 'eigenaar'])->group(function() {
//     Route::get('/sushi', [\App\Http\Controllers\SushiController::class,'index'])->middleware(['auth']);
//     Route::get('/sushi/{id}', [\App\Http\Controllers\SushiController::class,'show']);
//     Route::get('/', [\App\Http\Controllers\SushiController::class,'index']);  
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
