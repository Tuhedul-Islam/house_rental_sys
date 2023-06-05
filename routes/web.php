<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AddNewHouseController;
use App\Http\Controllers\ClientRegisterController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailSettingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SliderController;
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
/***********Clear All Cache**************/
Route::get('clear', function (){
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    dd('Done');
});
/*********Clear All Cache************/
/**
 *************************************
 *********Frontend Routes*************
 *************************************
 */
Route::get('/', [ FrontendController::class, 'index']);
Route::get('/user-login', [ FrontendController::class, 'login']);
Route::get('/user-register', [ FrontendController::class, 'register']);
Route::get('/all-houses', [ FrontendController::class, 'allHouses']);
Route::get('/single-house-details/{id}', [ FrontendController::class, 'singleHouseDetails']);
Route::get('/about', [ FrontendController::class, 'aboutUs']);
Route::get('/contact', [ FrontendController::class, 'contactUs']);
//Register/login Client
Route::post('/user-register', [ ClientRegisterController::class, 'userRegister']);
Route::post('/user-login', [ ClientRegisterController::class, 'userLogin']);

//Frontend Dashboard routes
Route::group(['middleware'=>['frontAuthUser']],function() {
    Route::get('/user-dashboard', [ AddNewHouseController::class, 'userDashboard']);
    //Add new house
    Route::get('/add-new-house', [ AddNewHouseController::class, 'create']);
    Route::post('/new-house-store', [ AddNewHouseController::class, 'store']);
    Route::get('/delete-single-house/{id}', [ AddNewHouseController::class, 'delete']);
    Route::get('/user-logout', [ FrontendController::class, 'userLogout']);
});




/**
 *************************************
 *********Backend Routes**************
 *************************************
 */
Route::get('/admin/login', function () {
    return view('auth.login');
});
Route::get('/register', function (){
    if (auth()->user()){ return redirect('/dashboard');}else{ return redirect('login'); }
});
Route::group(['middleware'=>['auth', 'locale', 'checkFrontendUser']],function() {
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

    /*************************************************House Owner Route Start Here****************************/
    Route::get('/house-owners', [UserAuthController::class, 'index']);
    Route::get('/house-owners/create', [UserAuthController::class, 'create' ]);
    Route::post('/house-owners/store', [UserAuthController::class, 'store' ]);
    Route::get('/house-owners/edit/{id}', [UserAuthController::class, 'edit' ]);
    Route::post('/house-owners/update/{id}', [UserAuthController::class, 'update' ]);
    Route::get('/house-owners/status/{id}', [UserAuthController::class, 'status' ]);
    Route::get('/house-owners/delete/{id}', [UserAuthController::class, 'delete' ]);
    /*************************************************House Owner Route End Here*****************************/

    /*************************************************Customer Route Start Here****************************/
    Route::get('/customers', [UserAuthController::class, 'index']);
    Route::get('/customers/create', [UserAuthController::class, 'create' ]);
    Route::post('/customers/store', [UserAuthController::class, 'store' ]);
    Route::get('/customers/edit/{id}', [UserAuthController::class, 'edit' ]);
    Route::post('/customers/update/{id}', [UserAuthController::class, 'update' ]);
    Route::get('/customers/status/{id}', [UserAuthController::class, 'status' ]);
    Route::get('/customers/delete/{id}', [UserAuthController::class, 'delete' ]);
    /*************************************************Customer Route End Here*****************************/

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
    Route::get('user-profile/', [UserAuthController::class, 'userProfile' ]);
    Route::post('user-profile/update/', [UserAuthController::class, 'userProfileUpdate' ]);
    /*************************************************User Profile Route End Here*******************/

    /********************************************Password Route End Here******************************/
    Route::get('/change-password', [NewPasswordController::class, 'changePassword']);
    Route::post('/update-password', [NewPasswordController::class, 'updatePassword']);
    /********************************************Password Route End Here******************************/

    /********************************************Password Route Start Here******************************/
    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::get('/permissions/create', [PermissionController::class, 'create' ]);
    Route::post('/permissions/store', [PermissionController::class, 'store' ]);
    Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit' ]);
    Route::post('/permissions/update/{id}', [PermissionController::class, 'update' ]);
    Route::get('/permissions/delete/{id}', [PermissionController::class, 'delete' ]);
    /********************************************Password Route End Here******************************/

    /********************************************Slider Route Start Here******************************/
    Route::get('/sliders', [SliderController::class, 'index']);
    Route::get('/sliders/create', [SliderController::class, 'create' ]);
    Route::post('/sliders/store', [SliderController::class, 'store' ]);
    Route::get('/sliders/edit/{id}', [SliderController::class, 'edit' ]);
    Route::post('/sliders/update/{id}', [SliderController::class, 'update' ]);
    Route::get('/sliders/delete/{id}', [SliderController::class, 'delete' ]);
    Route::get('/sliders/status/{id}', [SliderController::class, 'status' ]);
    /********************************************Slider Route End Here******************************/

    /********************************************About US Route Start Here**************************/
    Route::get('/about-us', [AboutUsController::class, 'index']);
    Route::get('/about-us/edit/{id}', [AboutUsController::class, 'edit' ]);
    Route::post('/about-us/update/{id}', [AboutUsController::class, 'update' ]);
    /********************************************About US Route End Here***************************/

    /********************************************Contact US Route Start Here**************************/
    Route::get('/contact-us', [ContactUsController::class, 'index']);
    Route::post('/contact-us/store', [ContactUsController::class, 'store' ])->withoutMiddleware('auth');
    Route::get('/contact-us/view/{id}', [ContactUsController::class, 'view' ]);
    Route::get('/contact-us/delete/{id}', [ContactUsController::class, 'delete' ]);
    /********************************************Contact US Route End Here***************************/

});
