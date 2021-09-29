<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestorController;
use App\Http\Controllers\RegistrarController;

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
    if (!auth()->user()) {
        return redirect()->route('login');
    }else{
        return redirect()->route('redirect');
    }
});
Route::get('/payment/tutorial', function(){
    return view('pages.tutorial');
})->name('tutorial');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    switch (auth()->user()->role) {
        case 'requestor':
            return redirect()->route('dashboard');
            break;
        case 'registrar':
            return redirect()->route('reg-dashboard');
            break;
    }
})->name('redirect');

Route::get('/requestor/information',[RequestorController::class,'information'])->name('information');
Route::get('test', function() {
    Storage::disk('google')->put('/test.txt', 'Hello World');
});

Route::group(['middleware'=>[
    'auth:sanctum',
    'verified',
    'requestor',
]],function(){
    
    Route::get('/requestor/dashboard',[RequestorController::class,'dashboard'])->name('dashboard');
    Route::get('/requestor/request',[RequestorController::class,'request'])->name('request');
    Route::get('/requestor/finalize',[RequestorController::class,'finalize'])->name('finalize');
    Route::get('/requestor/view-request',[RequestorController::class,'viewrequest'])->name('viewrequest');



});

Route::group(['middleware'=>[
    'auth:sanctum',
    'verified',
    'registrar',
]],function(){
    Route::get('/sksu-registrar/dashboard',[RegistrarController::class,'dashboard'])->name('reg-dashboard');
    Route::get('/sksu-registrar/request',[RegistrarController::class,'request'])->name('reg-request');
    Route::get('/sksu-registrar/from-graduates',[RegistrarController::class,'graduates'])->name('reg-graduates');
    Route::get('/sksu-registrar/reports',[RegistrarController::class,'reports'])->name('reg-reports');

    
    // request
    Route::get('/requests/all',[RegistrarController::class,'all'])->name('req-all');
    Route::get('/requests/pending',[RegistrarController::class,'pending'])->name('req-pending');
    Route::get('/requests/approved',[RegistrarController::class,'approved'])->name('req-approved');
    Route::get('/requests/payment-review',[RegistrarController::class,'review'])->name('req-review');
    Route::get('/requests/denied',[RegistrarController::class,'denied'])->name('req-denied');
    Route::get('/requests/from-graduate/to-clear',[RegistrarController::class,'toclear'])->name('req-toclear');
    Route::get('/requests/ready-to-claim',[RegistrarController::class,'ready'])->name('req-ready');
    Route::get('/requests/claimed',[RegistrarController::class,'claimed'])->name('req-claimed');


});