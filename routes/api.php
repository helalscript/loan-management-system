<?php



use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\V1\CMS\AboutPageController;
use App\Http\Controllers\API\V1\CMS\EmployerPageController;
use App\Http\Controllers\API\V1\CMS\HomePageController;
use App\Http\Controllers\API\V1\CMS\ResourcesPageController;
use App\Http\Controllers\API\V1\CMS\StateLicensingPageController;
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
Route::group(['prefix' => 'cms/home-page'], function () {
    Route::get('/hero-section', [HomePageController::class, 'getHeroSection']);
    Route::get('/service-section', [HomePageController::class, 'getServiceSection']);
    Route::get('/about-section', [HomePageController::class, 'getAboutUsSection']);
    Route::get('/quick-rate-section', [HomePageController::class, 'getQuickRateCheckSection']);
    Route::get('/work-process-section', [HomePageController::class, 'getWorkProcessSection']);
    Route::get('/faq-section', [HomePageController::class, 'getFaqSection']);
    Route::get('/testimonial-section', [HomePageController::class, 'getTestimonialSection']);
    Route::get('/custom-text-section', [HomePageController::class, 'getCustomTextSection']);
});

//route for about page 
Route::group(['prefix' => 'cms/about-page'], function () {
    Route::get('/hero-section', [AboutPageController::class, 'getHeroSection']);
    Route::get('/our-vision-section', [AboutPageController::class, 'getOurVisionSection']);
    Route::get('/our-mission-section', [AboutPageController::class, 'getOurMissionSection']);
    Route::get('/how-it-works-section', [AboutPageController::class, 'getHowitWorksSectionSection']);
    Route::get('/our-services-section', [AboutPageController::class, 'getOurServicesSection']);
    Route::get('/leadership-teams-section', [AboutPageController::class, 'getLeadershipTeamSectionSection']);
    Route::get('/custom-text-section', [AboutPageController::class, 'getCustomTextSection']);
});

//route for resource page
Route::group(['prefix' => 'cms/resource-page'], function () {
    Route::get('/hero-section', [ResourcesPageController::class, 'getHeroSection']);
    Route::get('/loan-calculator-section', [ResourcesPageController::class, 'getLoanCalculatorSectionSection']);
    Route::get('/ripe-credit-tracker-section', [ResourcesPageController::class, 'getRipeCreditTrackerGuideSection']);
    Route::get('/repayment-options-section', [ResourcesPageController::class, 'getRepaymentOptionsSection']);
    Route::get('/fees-policies-section', [ResourcesPageController::class, 'getFeesPoliciesSection']);
    Route::get('/security-privacy-section', [ResourcesPageController::class, 'getSecurityPrivacySection']);
    Route::get('/blogs-section', [ResourcesPageController::class, 'getBlogsSection']);
});

//route for state lincensing page
Route::group(['prefix' => 'cms/state-licensing-page'], function () {
    Route::get('/hero-section', [StateLicensingPageController::class, 'getHeroSection']);
    Route::get('/page-content-section', [StateLicensingPageController::class, 'getPageContentSectionSection']);
});
