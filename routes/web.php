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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['register'=> false]);





// user routes
Route::prefix('/')->group(function () {
    Route::get('about', 'TourController@about')->name('about');
    Route::get('blog', 'TourController@blog')->name('blog');
    Route::get('contact', 'TourController@contact')->name('contact');
    Route::post('contact', 'TourController@sendEmail')->name('email');
    Route::get('gallery', 'TourController@gallery')->name('gallery');
    Route::get('home', 'TourController@home')->name('home');
    Route::get('journals', 'TourController@journals')->name('journals');

    Route::get('destination', 'TourController@destination')->name('destination');
    Route::get('destination/{id}', 'TourController@showDestination')->name('showDestination');
    Route::get('destination/like/{id}', 'TourController@likeDestination')->name('likeDestination');
    Route::post('destination/comment', 'TourController@addDistinationComment')->name('addDestinationComment');
    Route::get('destination/comment/{id}', 'TourController@displayDestinationComments')->name('displayDestinationsComment');
});





// admin routes
Route::middleware(['auth'])->group(function () {
    // home section
    Route::post('admin/home', 'HomePageController@save')->name('home.save');
    Route::patch('admin/home', 'HomePageController@select')->name('home.select');
    Route::get('admin/home', 'HomePageController@index')->name('home.index');
    Route::get('admin/home/{id}', 'HomePageController@edit')->name('home.edit');
    Route::put('admin/home', 'HomePageController@update')->name('home.update');
    Route::delete('admin/home', 'HomePageController@delete')->name('home.delete');


    // about section
    Route::post('admin/about', 'AboutPageController@save')->name('about.save');
    Route::get('admin/about', 'AboutPageController@index')->name('about.index');
    Route::get('admin/about/{id}', 'AboutPageController@edit')->name('about.edit');
    Route::put('admin/about', 'AboutPageController@update')->name('about.update');
    Route::delete('admin/about', 'AboutPageController@delete')->name('about.delete');


    // gallery section
    Route::post('admin/gallery', 'GalleryPageController@save')->name('gallery.save');
    Route::get('admin/gallery', 'GalleryPageController@index')->name('gallery.index');
    Route::get('admin/gallery/{id}', 'GalleryPageController@edit')->name('gallery.edit');
    Route::put('admin/gallery', 'GalleryPageController@update')->name('gallery.update');
    Route::delete('admin/gallery', 'GalleryPageController@delete')->name('gallery.delete');


    // destination section
    Route::post('admin/destination', 'DestinationPageController@save')->name('destination.save');
    Route::get('admin/destination', 'DestinationPageController@index')->name('destination.index');
    Route::get('admin/destination/{id}', 'DestinationPageController@edit')->name('destination.edit');
    Route::put('admin/destination', 'DestinationPageController@update')->name('destination.update');
    Route::delete('admin/destination', 'DestinationPageController@delete')->name('destination.delete');
});




