<?php

use App\Http\Controllers\Web\Backend\CMS\AboutPageController;
use App\Http\Controllers\Web\Backend\CMS\AboutPageHowItWorkController;
use App\Http\Controllers\Web\Backend\CMS\AboutPageLeadershipController;
use App\Http\Controllers\Web\Backend\CMS\AuthPageController;
use App\Http\Controllers\Web\Backend\CMS\ContactUsPageController;
use App\Http\Controllers\Web\Backend\CMS\HomePageController;
use App\Http\Controllers\Web\Backend\CMS\HomePageServiceController;
use App\Http\Controllers\Web\Backend\CMS\HomePageWorkProcessController;
use App\Http\Controllers\Web\Backend\CMS\HomeTestimonialController;
use App\Http\Controllers\Web\Backend\CMS\ResourcesPageController;
use Illuminate\Support\Facades\Route;

// ===================== CMS HOME PAGE =====================
Route::prefix('cms/home-page')->name('cms.home_page.')->group(function () {

    Route::get('/hero-section', [HomePageController::class, 'getHeroSection'])->name('hero_section.create');
    Route::post('/hero-section', [HomePageController::class, 'updateHeroSection'])->name('hero_section.update');

    Route::resource('services', HomePageServiceController::class)->names('services_section');
    Route::post('services/status/{id}', [HomePageServiceController::class, 'status'])->name('services_section.status');
    Route::post('services/update-container', [HomePageServiceController::class, 'updateContainer'])->name('services_section.update_container');

    Route::get('/about-us', [HomePageController::class, 'getAboutUs'])->name('about_us_section.create');
    Route::post('/about-us', [HomePageController::class, 'updateAboutUs'])->name('about_us_section.update');

    Route::get('/quick-rate-check', [HomePageController::class, 'getQuickRateCheck'])->name('quick_rate_check_section.create');
    Route::post('/quick-rate-check', [HomePageController::class, 'updateQuickRateCheck'])->name('quick_rate_check_section.update');

    Route::resource('/work-process', HomePageWorkProcessController::class)->names('work_process_section');
    Route::post('/work-process/status/{id}', [HomePageWorkProcessController::class, 'status'])->name('work_process_section.status');
    Route::post('/work-process/update-container', [HomePageWorkProcessController::class, 'updateContainer'])->name('work_process_section.update_container');

    // Route::get('/faqs', [HomePageController::class, 'getFaq'])->name('faq_section.create');
    Route::post('/faqs', [HomePageController::class, 'updateFaq'])->name('faq_section.update');

    Route::resource('/testimonials', HomeTestimonialController::class)->names('testimonial_section');
    Route::post('/testimonials/status/{id}', [HomeTestimonialController::class, 'status'])->name('testimonial_section.status');
    Route::post('/testimonials/update-container', [HomeTestimonialController::class, 'updateContainer'])->name('testimonial_section.update_container');

    Route::get('/custom-text', [HomePageController::class, 'getCustomText'])->name('custom_text_section.create');
    Route::post('/custom-text', [HomePageController::class, 'updateCustomText'])->name('custom_text_section.update');
});


// ===================== CMS ABOUT PAGE =====================
Route::prefix('cms/about-page')->name('cms.about_page.')->group(function () {
    Route::get('/hero-section', [AboutPageController::class, 'getHeroSection'])->name('hero_section.create');
    Route::post('/hero-section', [AboutPageController::class, 'updateHeroSection'])->name('hero_section.update');


    Route::get('/our-vision', [AboutPageController::class, 'getOurVision'])->name('our_vision.create');
    Route::post('/our-vision', [AboutPageController::class, 'updateOurVision'])->name('our_vision.update');

    Route::get('/our-mission', [AboutPageController::class, 'getOurMission'])->name('our_mission.create');
    Route::post('/our-mission', [AboutPageController::class, 'updateOurMission'])->name('our_mission.update');

    Route::resource('/how-it-works', AboutPageHowItWorkController::class)->names('how_it_works_section');
    Route::post('/how-it-works/status/{id}', [AboutPageHowItWorkController::class, 'status'])->name('how_it_works_section.status');
    Route::post('/how-it-works/update-container', [AboutPageHowItWorkController::class, 'updateContainer'])->name('how_it_works_section.update_container');

    Route::get('/our-services', [AboutPageController::class, 'getOurServices'])->name('our_services.create');
    Route::post('/our-services', [AboutPageController::class, 'updateOurServices'])->name('our_services.update');

    Route::resource('/leadership-teams', AboutPageLeadershipController::class)->names('leadership_teams_section');
    Route::post('/leadership-teams/status/{id}', [AboutPageLeadershipController::class, 'status'])->name('leadership_teams_section.status');
    Route::post('/leadership-teams/update-container', [AboutPageLeadershipController::class, 'updateContainer'])->name('leadership_teams_section.update_container');
    // Route::get('/faqs', [AboutPageController::class, 'getFaqs'])->name('faqs.create');
    // Route::post('/faqs', [AboutPageController::class, 'updateFaqs'])->name('faqs.update');

    // Route::get('/testimonials', [AboutPageController::class, 'getTestimonials'])->name('testimonials.create');
    // Route::post('/testimonials', [AboutPageController::class, 'updateTestimonials'])->name('testimonials.update');
    Route::get('/custom-text', [AboutPageController::class, 'getCustomText'])->name('custom_text_section.create');
    Route::post('/custom-text', [AboutPageController::class, 'updateCustomText'])->name('custom_text_section.update');
});


// ===================== CMS RESOURCES PAGE =====================
Route::prefix('cms/resources-page')->name('cms.resources_page.')->group(function () {
    Route::get('/loan-calculator', [ResourcesPageController::class, 'getLoanCalculator'])->name('loan_calculator.create');
    Route::post('/loan-calculator', [ResourcesPageController::class, 'updateLoanCalculator'])->name('loan_calculator.update');

    Route::get('/ripe-credit-tracker-guide', [ResourcesPageController::class, 'getRipeCreditTrackerGuide'])->name('ripe_credit_tracker_guide.create');
    Route::post('/ripe-credit-tracker-guide', [ResourcesPageController::class, 'updateRipeCreditTrackerGuide'])->name('ripe_credit_tracker_guide.update');

    Route::get('/repayment-options', [ResourcesPageController::class, 'getRepaymentOptions'])->name('repayment_options.create');
    Route::post('/repayment-options', [ResourcesPageController::class, 'updateRepaymentOptions'])->name('repayment_options.update');

    Route::get('/fees-policies', [ResourcesPageController::class, 'getFeesPolicies'])->name('fees_policies.create');
    Route::post('/fees-policies', [ResourcesPageController::class, 'updateFeesPolicies'])->name('fees_policies.update');

    Route::get('/security-privacy', [ResourcesPageController::class, 'getSecurityPrivacy'])->name('security_privacy.create');
    Route::post('/security-privacy', [ResourcesPageController::class, 'updateSecurityPrivacy'])->name('security_privacy.update');

    Route::get('/faqs', [ResourcesPageController::class, 'getFaqs'])->name('faqs.create');
    Route::post('/faqs', [ResourcesPageController::class, 'updateFaqs'])->name('faqs.update');

    Route::get('/blogs', [ResourcesPageController::class, 'getBlogs'])->name('blogs.create');
    Route::post('/blogs', [ResourcesPageController::class, 'updateBlogs'])->name('blogs.update');
});


// ===================== CMS CONTACT US PAGE =====================
Route::prefix('cms/contact-us-page')->name('cms.contact_us_page.')->group(function () {
    Route::get('/', [ContactUsPageController::class, 'index'])->name('index');
    Route::post('/', [ContactUsPageController::class, 'update'])->name('update');

    Route::get('/form', [ContactUsPageController::class, 'getForm'])->name('form.create');
    Route::post('/form', [ContactUsPageController::class, 'updateForm'])->name('form.update');
});


// ===================== CMS AUTH PAGE =====================
Route::prefix('cms/auth-page')->name('cms.auth_page.')->group(function () {
    Route::get('/login', [AuthPageController::class, 'getLogin'])->name('login.create');
    Route::post('/login', [AuthPageController::class, 'updateLogin'])->name('login.update');

    Route::get('/register', [AuthPageController::class, 'getRegister'])->name('register.create');
    Route::post('/register', [AuthPageController::class, 'updateRegister'])->name('register.update');

    Route::get('/forgot-password', [AuthPageController::class, 'getForgotPassword'])->name('forgot_password.create');
    Route::post('/forgot-password', [AuthPageController::class, 'updateForgotPassword'])->name('forgot_password.update');
});