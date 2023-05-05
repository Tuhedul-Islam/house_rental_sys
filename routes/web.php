<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailSettingController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SystemSettingController;
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
Route::group(['middleware'=>['auth', 'locale']],function() {
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

    /*************************************************Role management Route Start Here****************/
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/create', [RoleController::class, 'create' ]);
    Route::post('/roles/store', [RoleController::class, 'store' ]);
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit' ]);
    Route::post('/roles/update/{id}', [RoleController::class, 'update' ]);
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete' ]);
    /*************************************************Role management Route End Here******************/

    /*************************************************Module management Route Start Here****************/
    Route::get('/modules', [ModuleController::class, 'index']);
    Route::get('/modules/create', [ModuleController::class, 'create' ]);
    Route::post('/modules/store', [ModuleController::class, 'store' ]);
    Route::get('/modules/edit/{id}', [ModuleController::class, 'edit' ]);
    Route::post('/modules/update/{id}', [ModuleController::class, 'update' ]);
    Route::get('/modules/delete/{id}', [ModuleController::class, 'delete' ]);
    /*************************************************Module management Route End Here******************/

    /*************************************************System management All Setting Route Start Here*************/
    Route::group(['prefix'=>'settings','as'=>'settings.'], function (){
        //system setting
        Route::get('system-setting', [SystemSettingController::class, 'edit' ]);
        Route::post('system-setting-store', [SystemSettingController::class, 'update' ]);
        //Localization
        Route::get('change-language/{lang}', [LocalizationController::class, 'changeLanguage' ]);
        Route::get('language-setting/', [LocalizationController::class, 'languageSetting' ]);
        Route::get('language/edit/{lang}', [LocalizationController::class, 'languageEdit' ]);
        Route::post('language/update/{lang}', [LocalizationController::class, 'languageUpdate' ]);
        //Email Setting
        Route::get('email-setting', [EmailSettingController::class, 'emailSetting' ]);
        Route::post('email-setting-store', [EmailSettingController::class, 'emailSettingStore' ]);
    });
    /*************************************************System management All Setting Route End Here***************/

    /*************************************************User Profile Route Start Here*****************/
    Route::get('user-profile/', [ItemController::class, 'userProfile' ]);
    Route::post('user-profile/update/', [ItemController::class, 'userProfileUpdate' ]);
    /*************************************************User Profile Route End Here*******************/

    /********************************************Password Route End Here******************************/
    Route::get('/change-password', [NewPasswordController::class, 'changePassword']);
    Route::post('/update-password', [NewPasswordController::class, 'updatePassword']);
    /********************************************Password Route End Here******************************/

});
