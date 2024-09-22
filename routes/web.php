<?php

use App\Models\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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
    $totalClient = Client::count();
    return view('welcome', [
        'totalClient' => $totalClient,
    ]);
});

//for indexing form
Route::get('/add-new-client',[ClientController::class, 'index'])->name('add-new-client'); 

//for inserting data
Route::post('/add-new-client-store',[ClientController::class, 'store'])->name('add-new-client-store'); 

// Show single data
Route::get('/show-single-data/{id}',[ClientController::class, 'showSingleData'])->name('show-single-data'); 


//for all clients
Route::get('/all-clients', function () {
    $allClientsCollection = Client::all();
    return view('all-clients', [
        'allClientsCollection' => $allClientsCollection,
    ]);
});
