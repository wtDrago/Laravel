<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\TeamController;

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


// Route::get('party_index', 'UserController@index');


// Route::get('/party_index', function () {
//     return view('party_index');
// });
Route::get('/team/index', [TeamController::class, 'index']);
Route::get('/party/index', [PartyController::class, 'index']);
Route::get('/insight/index', [PartyController::class, 'index']);
Route::get('/challege/index', [PartyController::class, 'index']);
Route::get('/reward/index', [PartyController::class, 'index']);