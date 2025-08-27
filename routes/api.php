<?php



use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\V1\CMS\EmployerPageController;
use App\Http\Controllers\API\V1\CMS\HomePageController;
use App\Http\Controllers\API\V1\DashboardController;
use App\Http\Controllers\API\V1\User\UserContactSupportController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'guest:api'], function ($router) {
    //login
    Route::post('login', [LoginController::class, 'login']);
    //forgot password
    Route::post('/forget-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('/verify-otp', [ResetPasswordController::class, 'VerifyOTP']);
    Route::post('/reset-password', [ResetPasswordController::class, 'ResetPassword']);

});

Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::get('/refresh-token', [LoginController::class, 'refreshToken']);
    Route::post('/logout', [LogoutController::class, 'logout']);
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/update-profile', [UserController::class, 'updateProfile']);
    Route::post('/update-password', [UserController::class, 'changePassword']);
});


// only for user
Route::group(['middleware' => ['auth:api', 'check_is_user']], function ($router) {

    //route for dashboard data
    Route::get('/dashboard-data', [DashboardController::class, 'dashboardData']);
});



// only for user and host
Route::group(['middleware' => ['auth:api']], function ($router) {
    Route::post('/contact-support-message/sent', [UserContactSupportController::class, 'store']);
});

// --------- cms part --------------
Route::get('/cms/social-link', [HomePageController::class, 'getSocialLinks']);
Route::get('/cms/system-info', [HomePageController::class, 'getSystemInfo']);


// dynamic page
Route::get("dynamic-pages", [HomePageController::class, "getDynamicPages"]);
Route::get("dynamic-pages/single/{slug}", [HomePageController::class, "showDaynamicPage"]);

//route for home page 
Route::get('/cms/home-page/hero-section', [HomePageController::class, 'getHeroSection']);
Route::get('/cms/home-page/welcome-section', [HomePageController::class, 'getWelcomeSection']);
Route::get('/cms/home-page/employer-section', [HomePageController::class, 'getEmployerSection']);
Route::get('/cms/home-page/how-it-work-section', [HomePageController::class, 'getHowItWorkSection']);
Route::get('/cms/home-page/job-seeker-section', [HomePageController::class, 'getJobSeekerSection']);
Route::get('/cms/home-page/our-expertise-section', [HomePageController::class, 'getOurExpertiseSection']);
Route::get('/cms/home-page/why-choose-us-section', [HomePageController::class, 'getWhyChooseUsSection']);
