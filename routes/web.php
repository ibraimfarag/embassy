<?php

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

Route::group(['prefix'=>'ar','as'=>'ar.'], function(){
    Route::get('/', 'PageController@showPageAr');
    Route::get('/{page}', 'PageController@showPageAr');
});

Route::group(['prefix'=>'en','as'=>'en.'], function(){
    Route::get('/', 'PageController@showPageEn');
    Route::get('/{page}', 'PageController@showPageEn');
});

Route::post('/search', 'SearchController@searchPost');
Route::post('en/search', 'SearchController@searchPost');
Route::post('ar/search', 'SearchController@searchPost');

Route::get('get-weather', 'PageController@getWeather');
Route::get('p/{slug}', 'PageController@showArticlePage');
Route::get('/ar/p/{slug}', 'PageController@showArticlePageAR');
Route::get('/en/p/{slug}', 'PageController@showArticlePageEN');

Route::post('/newsletter-submit', 'FormController@newsletterStore');

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

    Route::group(['prefix' => 'newsletters','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\NewsletterController@index');
        Route::get('/delete/{id}', 'Admin\NewsletterController@delete');
        Route::get('/export', 'FormController@export');
        Route::get('/{id}', 'Admin\NewsletterController@show');
    });

    Route::group(['prefix' => 'content','middleware' => 'auth'], function() {

        Route::group(['prefix' => 'announcements','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\AnnouncementController@index');
            Route::get('/edit/{id}', 'Admin\AnnouncementController@edit');
            Route::post('/update', 'Admin\AnnouncementController@update');
            Route::get('/create/', 'Admin\AnnouncementController@create');
            Route::post('/store/', 'Admin\AnnouncementController@store');
            Route::get('/delete/{id}', 'Admin\AnnouncementController@delete');
        });

        Route::group(['prefix' => 'timeline','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\TimelineController@index');
            Route::get('/edit/{id}', 'Admin\TimelineController@edit');
            Route::post('/update', 'Admin\TimelineController@update');
            Route::get('/create/', 'Admin\TimelineController@create');
            Route::post('/store/', 'Admin\TimelineController@store');
            Route::get('/delete/{id}', 'Admin\TimelineController@delete');
        });

        Route::group(['prefix' => 'articles','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\ArticleController@index');
            Route::get('/edit/{id}', 'Admin\ArticleController@edit');
            Route::post('/update', 'Admin\ArticleController@update');
            Route::get('/create/', 'Admin\ArticleController@create');
            Route::post('/store/', 'Admin\ArticleController@store');
            Route::get('/delete/{id}', 'Admin\ArticleController@delete');
        });

        Route::group(['prefix' => 'press-releases','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\PressReleaseController@index');
            Route::get('/edit/{id}', 'Admin\PressReleaseController@edit');
            Route::post('/update', 'Admin\PressReleaseController@update');
            Route::get('/create/', 'Admin\PressReleaseController@create');
            Route::post('/store/', 'Admin\PressReleaseController@store');
            Route::get('/delete/{id}', 'Admin\PressReleaseController@delete');
        });

        Route::group(['prefix' => 'economic-bulletins','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\EconomicBulletinController@index');
            Route::get('/edit/{id}', 'Admin\EconomicBulletinController@edit');
            Route::post('/update', 'Admin\EconomicBulletinController@update');
            Route::get('/create/', 'Admin\EconomicBulletinController@create');
            Route::post('/store/', 'Admin\EconomicBulletinController@store');
            Route::get('/delete/{id}', 'Admin\EconomicBulletinController@delete');
        });

        Route::group(['prefix' => 'newsletters-media','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\NewsletterMediaController@index');
            Route::get('/edit/{id}', 'Admin\NewsletterMediaController@edit');
            Route::post('/update', 'Admin\NewsletterMediaController@update');
            Route::get('/create/', 'Admin\NewsletterMediaController@create');
            Route::post('/store/', 'Admin\NewsletterMediaController@store');
            Route::get('/delete/{id}', 'Admin\NewsletterMediaController@delete');
        });

        Route::group(['prefix' => 'galleries','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\GalleryController@index');
            Route::get('/edit/{id}', 'Admin\GalleryController@edit');
            Route::post('/update', 'Admin\GalleryController@update');
            Route::get('/create/', 'Admin\GalleryController@create');
            Route::post('/store/', 'Admin\GalleryController@store');
            Route::get('/delete/{id}', 'Admin\GalleryController@delete');
            Route::get('/delete-slide/{id}', 'Admin\GalleryController@deleteSlide');
        });


        Route::group(['prefix' => 'home-slides','middleware' => 'auth'], function() {
            Route::get('/', 'Admin\HomeSlideController@index');
            Route::get('/edit/{id}', 'Admin\HomeSlideController@edit');
            Route::post('/update', 'Admin\HomeSlideController@update');
            Route::get('/create/', 'Admin\HomeSlideController@create');
            Route::post('/store/', 'Admin\HomeSlideController@store');
            Route::get('/delete/{id}', 'Admin\HomeSlideController@delete');
        });

    });

    Route::group(['prefix' => 'faqs','middleware' => 'auth'], function() {
        Route::get('/edit/{id}', 'Admin\FAQController@edit');
        Route::post('/update', 'Admin\FAQController@update');
        Route::get('/create/{id}', 'Admin\FAQController@create');
        Route::post('/store/', 'Admin\FAQController@store');
        Route::get('/delete/{id}', 'Admin\FAQController@delete');
        Route::get('/{id}', 'Admin\FAQController@index');
    });

    Route::get('/home', 'Admin\PageController@home');
    Route::get('/entries', 'Admin\PageController@entries');
    Route::get('/entries/delete/{id}', 'Admin\PageController@entriesDelete');
    Route::get('/entries/export', 'Admin\PageController@exportXLS');
    Route::post('/update', 'Admin\PageController@update');
    Route::get('/posts/{page}', 'Admin\PostController@index');
    Route::get('/posts/edit/{id}', 'Admin\PostController@edit');
    Route::post('/posts/update', 'Admin\PostController@update');
    Route::get('/posts/create/{slug}', 'Admin\PostController@create');
    Route::post('/posts/post', 'Admin\PostController@post');
    Route::get('/posts/delete/{id}', 'Admin\PostController@delete');

    Route::group(['prefix' => 'teams','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\TeamController@index');
        Route::get('/edit/{id}', 'Admin\TeamController@edit');
        Route::post('/update', 'Admin\TeamController@update');
        Route::get('/create/', 'Admin\TeamController@create');
        Route::post('/store/', 'Admin\TeamController@store');
        Route::get('/delete/{id}', 'Admin\TeamController@delete');
    });


    Route::group(['prefix' => 'facilities','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\FacilityController@index');
        Route::get('/edit/{id}', 'Admin\FacilityController@edit');
        Route::post('/update', 'Admin\FacilityController@update');
        Route::get('/create/', 'Admin\FacilityController@create');
        Route::post('/store/', 'Admin\FacilityController@store');
        Route::get('/delete/{id}', 'Admin\FacilityController@delete');
        Route::get('/delete-slide/{id}', 'Admin\FacilityController@deleteSlide');
    });

    Route::group(['prefix' => 'sections','middleware' => 'auth'], function() {
        Route::get('/edit/{id}', 'Admin\SectionController@edit');
        Route::post('/update', 'Admin\SectionController@update');
        Route::get('/delete/{id}', 'Admin\SectionController@delete');
        Route::get('/delete-slide/{id}', 'Admin\SectionController@deleteSlide');
    });

    Route::group(['prefix' => 'testimonials','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\CommunityController@index');
        Route::get('/edit/{id}', 'Admin\CommunityController@edit');
        Route::post('/update', 'Admin\CommunityController@update');
        Route::get('/create/', 'Admin\CommunityController@create');
        Route::post('/store/', 'Admin\CommunityController@store');
        Route::get('/delete/{id}', 'Admin\CommunityController@delete');
    });

    Route::group(['prefix' => 'alumnis','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\AlumniController@index');
        Route::get('/edit/{id}', 'Admin\AlumniController@edit');
        Route::post('/update', 'Admin\AlumniController@update');
        Route::get('/create/', 'Admin\AlumniController@create');
        Route::post('/store/', 'Admin\AlumniController@store');
        Route::get('/delete/{id}', 'Admin\AlumniController@delete');
    });

    Route::group(['prefix' => 'video-testimonials','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\VideoTestimonialController@index');
        Route::get('/edit/{id}', 'Admin\VideoTestimonialController@edit');
        Route::post('/update', 'Admin\VideoTestimonialController@update');
        Route::get('/create/', 'Admin\VideoTestimonialController@create');
        Route::post('/store/', 'Admin\VideoTestimonialController@store');
        Route::get('/delete/{id}', 'Admin\VideoTestimonialController@delete');
    });

    Route::group(['prefix' => 'openings','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\CareerController@index');
        Route::get('/edit/{id}', 'Admin\CareerController@edit');
        Route::post('/update', 'Admin\CareerController@update');
        Route::get('/create/', 'Admin\CareerController@create');
        Route::post('/store/', 'Admin\CareerController@store');
        Route::get('/delete/{id}', 'Admin\CareerController@delete');
    });

    Route::group(['prefix' => 'changes','middleware' => 'auth'], function() {
        Route::get('/', 'Admin\ChangeController@index');
        Route::get('/view/{id}', 'Admin\ChangeController@view');
        Route::get('/restore/{id}', 'Admin\ChangeController@restore');
    });

    Route::get('/section/{page}/{section}', 'Admin\PageController@section');
    Route::get('/{page}/', 'Admin\PageController@page');

});

Route::group([],function(){
    Route::get('/', 'PageController@showPage');
    Route::get('/{page}', 'PageController@showPage');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
