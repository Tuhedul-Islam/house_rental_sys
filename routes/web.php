<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Auth\UserAuthController;
use \App\Http\Controllers\Auth\NewPasswordController;


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

require __DIR__.'/auth.php';
/**
 *************************************
 *********Frontend Routes*************
 *************************************
 */

/*************************************************Clear All Cache*************************************/
Route::get('clear', function (){
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    dd('Done');
});
/*************************************************Clear All Cache*************************************/

Route::get('/', function () {
    return view('auth.login');
});


/**
 *************************************
 *********Backend Routes**************
 *************************************
 */
Route::get('/register', function (){
    if (auth()->user()){ return redirect('/dashboard');}else{ return redirect('login'); }
});
Route::group(['middleware'=>['auth']],function() {
    /*************************************************Dashboard Route Start Here*************************************/
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    /*************************************************Dashboard Route End Here***************************************/

    /*************************************************User Route Start Here****************************/
    Route::get('/users', [UserAuthController::class, 'index']);
    Route::get('/users/create', [UserAuthController::class, 'create' ]);
    Route::post('/users/store', [UserAuthController::class, 'store' ]);
    Route::get('/users/edit/{id}', [UserAuthController::class, 'edit' ]);
    Route::post('/users/update/{id}', [UserAuthController::class, 'update' ]);
    Route::get('/users/status/{id}', [UserAuthController::class, 'status' ]);
    Route::get('/users/delete/{id}', [UserAuthController::class, 'delete' ]);
    Route::get('/get-related-branches', [UserAuthController::class, 'getRelatedBranches' ]);
    Route::get('/get-related-counters', [UserAuthController::class, 'getRelatedCounters' ]);
    /*************************************************User Route End Here*****************************/
});
