<?php



use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\V1\CMS\AboutPageController;
use App\Http\Controllers\API\V1\CMS\EmployerPageController;
use App\Http\Controllers\API\V1\CMS\HomePageController;
use App\Http\Controllers\API\V1\CMS\JobSeekerPageController;
use App\Http\Controllers\API\V1\CMS\OtherPageController;
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
//route for employer page
Route::get('/cms/employer-page/hero-section', [EmployerPageController::class, 'getHeroSection']);
Route::get('/cms/employer-page/why-use-section', [EmployerPageController::class, 'getWhyUseSection']);
Route::get('/cms/employer-page/why-choose-us-section', [EmployerPageController::class, 'getWhyChooseUsSection']);
Route::get('/cms/employer-page/our-hiring-section', [EmployerPageController::class, 'getOurHiringSection']);
Route::get('/cms/employer-page/get-in-touch-section', [EmployerPageController::class, 'getGetInTouchSection']);
//route for job seeker page
Route::get('/cms/job-seeker-page/hero-section', [JobSeekerPageController::class, 'getHeroSection']);
Route::get('/cms/job-seeker-page/why-join-section', [JobSeekerPageController::class, 'getWhyJoinSection']);
Route::get('/cms/job-seeker-page/join-with-us-section', [JobSeekerPageController::class, 'getJoinWithUsSection']);
Route::get('/cms/job-seeker-page/how-it-work-section', [JobSeekerPageController::class, 'getHowItWorkSection']);
Route::get('/cms/job-seeker-page/get-in-touch-section', [JobSeekerPageController::class, 'getGetInTouchSection']);
//route for contact us page
Route::get('/cms/contact-us-page/hero-section', [OtherPageController::class, 'getHeroSectionContactUs']);
Route::get('/cms/contact-us-page/get-in-touch-section', [OtherPageController::class, 'getGetInTouchSectionContactUs']);
//route for privacy policy page
Route::get('/cms/privacy-policy-page/hero-section', [OtherPageController::class, 'getHeroSectionPrivacyPolicyPage']);
//route for terms and conditions page
Route::get('/cms/terms-and-conditions-page/hero-section', [OtherPageController::class, 'getHeroSectionTermsAndConditionsPage']);
//route for account page
Route::get('/cms/account-page/hero-section', [OtherPageController::class, 'getHeroSectionAccountPage']);