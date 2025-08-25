<?php

use App\Http\Controllers\Web\Backend\CMS\AboutPageController;
use App\Http\Controllers\Web\Backend\CMS\AuthPageController;
use App\Http\Controllers\Web\Backend\CMS\ContactUsPageController;
use App\Http\Controllers\Web\Backend\CMS\HomePageController;
use App\Http\Controllers\Web\Backend\CMS\ResourcesPageController;


// ===================== CMS HOME PAGE =====================
Route::prefix('cms/home-page')->name('cms.home_page.')->group(function () {
    Route::get('/hero-section', [HomePageController::class, 'getHeroSection'])->name('hero_section.create');
    Route::post('/hero-section', [HomePageController::class, 'updateHeroSection'])->name('hero_section.update');

    Route::get('/services-overview', [HomePageController::class, 'getServicesOverview'])->name('services_overview_section.create');
    Route::post('/services-overview', [HomePageController::class, 'updateServicesOverview'])->name('services_overview_section.update');

    Route::get('/work-process', [HomePageController::class, 'getWorkProcess'])->name('work_process_section.create');
    Route::post('/work-process', [HomePageController::class, 'updateWorkProcess'])->name('work_process_section.update');

    Route::get('/faq', [HomePageController::class, 'getFaq'])->name('faq_section.create');
    Route::post('/faq', [HomePageController::class, 'updateFaq'])->name('faq_section.update');

    Route::get('/testimonials', [HomePageController::class, 'getTestimonials'])->name('testimonial_section.create');
    Route::post('/testimonials', [HomePageController::class, 'updateTestimonials'])->name('testimonial_section.update');

    Route::get('/footer', [HomePageController::class, 'getFooter'])->name('footer_section.create');
    Route::post('/footer', [HomePageController::class, 'updateFooter'])->name('footer_section.update');
});


// ===================== CMS ABOUT PAGE =====================
Route::prefix('cms/about-page')->name('cms.about_page.')->group(function () {
    Route::resource('/our-story', AboutPageController::class)->names('our_story');
    Route::resource('/our-vision', AboutPageController::class)->names('our_vision');
    Route::resource('/our-mission', AboutPageController::class)->names('our_mission');
    Route::resource('/how-it-works', AboutPageController::class)->names('how_it_works');
    Route::resource('/our-services', AboutPageController::class)->names('our_services');
    Route::resource('/leadership-team', AboutPageController::class)->names('leadership_team');
    Route::resource('/faqs', AboutPageController::class)->names('faqs');
    Route::resource('/testimonials', AboutPageController::class)->names('testimonials');
});


// ===================== CMS RESOURCES PAGE =====================
Route::prefix('cms/resources-page')->name('cms.resources_page.')->group(function () {
    Route::resource('/loan-calculator', ResourcesPageController::class)->names('loan_calculator');
    Route::resource('/ripe-credit-tracker-guide', ResourcesPageController::class)->names('ripe_credit_tracker_guide');
    Route::resource('/repayment-options', ResourcesPageController::class)->names('repayment_options');
    Route::resource('/fees-policies', ResourcesPageController::class)->names('fees_policies');
    Route::resource('/security-privacy', ResourcesPageController::class)->names('security_privacy');
    Route::resource('/faqs', ResourcesPageController::class)->names('faqs');
    Route::resource('/blogs', ResourcesPageController::class)->names('blogs');
});


// ===================== CMS CONTACT US PAGE =====================
Route::prefix('cms/contact-us-page')->name('cms.contact_us_page.')->group(function () {
    Route::get('/', [ContactUsPageController::class, 'index'])->name('index');
    Route::post('/', [ContactUsPageController::class, 'update'])->name('update');

    Route::resource('/form', ContactUsPageController::class)->names('form');
});


// ===================== CMS AUTH PAGE =====================
Route::prefix('cms/auth-page')->name('cms.auth_page.')->group(function () {
    Route::resource('/login', AuthPageController::class)->names('login');
    Route::resource('/register', AuthPageController::class)->names('register');
    Route::resource('/forgot-password', AuthPageController::class)->names('forgot_password');
});