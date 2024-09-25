<?php

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Account;
use App\Models\DebitAccount;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;

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
    $totalcreditAmount = Account::sum('credit');
    $totalDebitAmount = DebitAccount::sum('debit_amount');
    $currentDate = Carbon::now();

    return view('welcome', [
        'totalClient' => $totalClient,
        'totalcreditAmount' => $totalcreditAmount,
        'totalDebitAmount' => $totalDebitAmount,
        'currentDate' => $currentDate,
    ]);
});

Route::get('/add-new-client',[ClientController::class, 'index'])->name('add-new-client'); //for indexing form
Route::post('/add-new-client-store',[ClientController::class, 'store'])->name('add-new-client-store');  //for inserting data
Route::get('/show-single-data/{id}',[ClientController::class, 'showSingleData'])->name('show-single-data');  // Show single data
Route::get('/edit-single-data/{id}',[ClientController::class, 'editSingleData'])->name('edit-single-data');  // edit single data
Route::post('/update-single-data/{id}',[ClientController::class, 'update'])->name(name: 'update-single-data');  // update single data
Route::get('/delete-single-data/{id}',[ClientController::class, 'delete'])->name(name: 'delete-single-data');  // delete single data




//for all clients
Route::get('/all-clients', function () {
    $allClientsCollection = Client::all()->reverse();
    return view('all-clients', [
        'allClientsCollection' => $allClientsCollection,
    ]);
});


//Credit account
Route::get('/dabit-and-credit',[AccountController::class, 'index'])->name(name: 'dabit-and-credit');  // credit-account
Route::post('/store-credit',[AccountController::class, 'storeCredit'])->name(name: 'store-credit');  // credit-account

//Debit accounce
Route::post('/debit-store',[AccountController::class, 'debitStore'])->name(name: 'debit-store');  // credit-account

// Post
Route::get('/add-new-post',[PostController::class, 'index'])->name(name: 'add-new-post');  // add-new-post
Route::post('/store-new-post',[PostController::class, 'store'])->name(name: 'store-new-post');  // store-new-post
Route::get('/all-posts',[PostController::class, 'show'])->name(name: 'all-posts');  // all-post

Route::get('/all-posts-design',[PostController::class, 'allPostsDesign'])->name(name: 'all-posts-design');  // all-post
Route::get('/single-post/{id}',[PostController::class, 'singlePost'])->name(name: 'single-post');  // single-post