<?php

    use App\Http\Controllers\ContactController;
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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/contacts', [ContactController::class, 'viewAllContacts']);

    Route::get('/contacts/{id}', [ContactController::class, 'viewContactById']);

    Route::get('/contacts/create', [ContactController::class, 'viewCreate']);

    Route::post('/contacts/create', [ContactController::class, 'save']);

    Route::put('/contacts/{id}', [ContactController::class, 'update']);

    Route::delete('/contacts/{id}', [ContactController::class, 'delete']);


