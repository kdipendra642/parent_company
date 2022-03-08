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
// Route::get('/', function() {
//     return view('welcome');
// });
use App\User;
use App\Models\Pages;
use App\Models\Posts;

Route::get('/dashboard', function () {
    $users = User::all();
    $pages = Pages::all();
    $posts = Posts::all();

    return view('admin.common.dashboard', compact('users', 'pages', 'posts'));
})->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',                                            ['as' => 'customer.index',              'uses' =>   'Frontend\SiteController@index']);
Route::get('company-profile/about-us',                     ['as' => 'customer.about-us',              'uses' =>   'Frontend\SiteController@about']);
Route::get('company-profile/introduction',                     ['as' => 'customer.introduction',              'uses' =>   'Frontend\SiteController@introduction']);
Route::get('company-profile/bod',                          ['as' => 'customer.bod',              'uses' =>   'Frontend\SiteController@board']);
Route::get('/category',                                    ['as' => 'customer.category',              'uses' =>   'Frontend\SiteController@category']);
Route::get('/view-category/{slug}',                        ['as' => 'customer.view-category',              'uses' =>   'Frontend\SiteController@viewCategory']);
Route::get('/view-posts/{slug}',                           ['as' => 'customer.view-posts',              'uses' =>   'Frontend\SiteController@viewPosts']);
Route::get('/view-pages/{slug}',                           ['as' => 'customer.view-pages',              'uses' =>   'Frontend\SiteController@viewPage']);
Route::get('/bod',                                         ['as' => 'customer.bod',              'uses' =>   'Frontend\SiteController@board']);
Route::get('/view-bod/{slug}',                             ['as' => 'customer.view-staffs',              'uses' =>   'Frontend\SiteController@viewStaffs']);

// Route::get('/view-category/{slug}',                        ['as' => 'customer.view-category',              'uses' =>   'Frontend\SiteController@viewCategory']);
Route::get('/gallery',                                     ['as' => 'customer.gallery',              'uses' =>   'Frontend\SiteController@gallery']);
Route::get('/contact-us',                                  ['as' => 'customer.contact',              'uses' =>   'Frontend\SiteController@contact']);
Route::get('/news-blogs',                                  ['as' => 'customer.news',              'uses' =>   'Frontend\SiteController@news']);
Route::post('/contact-us/store',                           ['as' => 'customer.contact-us.store',    'uses' =>   'Admin\ContactController@store']);




Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'namespace' => 'Admin\\', 'middleware' => ['auth']], function (){

    /*Routes for banner section */
    Route::get('/banner',                   ['as' => 'banner',          'uses' =>   'BannerController@index']);
    Route::get('/banner/create',            ['as' => 'banner.create',   'uses' =>   'BannerController@create']);
    Route::post('/banner/store',            ['as' => 'banner.store',    'uses' =>   'BannerController@store']);
    Route::get('/banner/edit/{id}',         ['as' => 'banner.edit',     'uses' =>   'BannerController@edit']);
    Route::post('/banner/update/{id}',      ['as' => 'banner.update',   'uses' =>   'BannerController@update']);
    Route::get('/banner/delete/{id}',       ['as' => 'banner.delete',   'uses' =>   'BannerController@destroy']);

     /*Routes for staff section */
     Route::get('/staff',                   ['as' => 'staff',          'uses' =>   'StaffController@index']);
     Route::get('/staff/create',            ['as' => 'staff.create',   'uses' =>   'StaffController@create']);
     Route::post('/staff/store',            ['as' => 'staff.store',    'uses' =>   'StaffController@store']);
     Route::get('/staff/edit/{id}',         ['as' => 'staff.edit',     'uses' =>   'StaffController@edit']);
     Route::post('/staff/update/{id}',      ['as' => 'staff.update',   'uses' =>   'StaffController@update']);
     Route::get('/staff/delete/{id}',       ['as' => 'staff.delete',   'uses' =>   'StaffController@destroy']);

     /*Routes for category section */
     Route::get('/category',                   ['as' => 'category',          'uses' =>   'CategoryController@index']);
     Route::get('/category/create',            ['as' => 'category.create',   'uses' =>   'CategoryController@create']);
     Route::post('/category/store',            ['as' => 'category.store',    'uses' =>   'CategoryController@store']);
     Route::get('/category/edit/{id}',         ['as' => 'category.edit',     'uses' =>   'CategoryController@edit']);
     Route::post('/category/update/{id}',      ['as' => 'category.update',   'uses' =>   'CategoryController@update']);
     Route::get('/category/delete/{id}',       ['as' => 'category.delete',   'uses' =>   'CategoryController@destroy']);

      /*Routes for technology section */
      Route::get('/client',                   ['as' => 'client',          'uses' =>   'ClientController@index']);
      Route::get('/client/create',            ['as' => 'client.create',   'uses' =>   'ClientController@create']);
      Route::post('/client/store',            ['as' => 'client.store',    'uses' =>   'ClientController@store']);
      Route::get('/client/edit/{id}',         ['as' => 'client.edit',     'uses' =>   'ClientController@edit']);
      Route::post('/client/update/{id}',      ['as' => 'client.update',   'uses' =>   'ClientController@update']);
      Route::get('/client/delete/{id}',       ['as' => 'client.delete',   'uses' =>   'ClientController@destroy']);


      /*Routes for post section */
      Route::get('/posts',                   ['as' => 'posts',          'uses' =>   'PostsController@index']);
      Route::get('/posts/create',            ['as' => 'posts.create',   'uses' =>   'PostsController@create']);
      Route::post('/posts/store',            ['as' => 'posts.store',    'uses' =>   'PostsController@store']);
      Route::get('/posts/edit/{id}',         ['as' => 'posts.edit',     'uses' =>   'PostsController@edit']);
      Route::post('/posts/update/{id}',      ['as' => 'posts.update',   'uses' =>   'PostsController@update']);
      Route::get('/posts/delete/{id}',       ['as' => 'posts.delete',   'uses' =>   'PostsController@destroy']);
      Route::get('/multipic/delete/{id}',       ['as' => 'multipic.delete',   'uses' =>   'PostsController@destroy_image']);

      /*Routes for pages section */
      Route::get('/pages',                   ['as' => 'pages',          'uses' =>   'PagesController@index']);
      Route::get('/pages/create',            ['as' => 'pages.create',   'uses' =>   'PagesController@create']);
      Route::post('/pages/store',            ['as' => 'pages.store',    'uses' =>   'PagesController@store']);
      Route::get('/pages/edit/{id}',         ['as' => 'pages.edit',     'uses' =>   'PagesController@edit']);
      Route::post('/pages/update/{id}',      ['as' => 'pages.update',   'uses' =>   'PagesController@update']);
      Route::get('/pages/delete/{id}',       ['as' => 'pages.delete',   'uses' =>   'PagesController@destroy']);

      /*Routes for gallery section */
      Route::get('/gallery',                   ['as' => 'gallery',          'uses' =>   'GalleryController@index']);
      Route::get('/gallery/create',            ['as' => 'gallery.create',   'uses' =>   'GalleryController@create']);
      Route::post('/gallery/store',            ['as' => 'gallery.store',    'uses' =>   'GalleryController@store']);
      Route::get('/gallery/delete/{id}',       ['as' => 'gallery.delete',   'uses' =>   'GalleryController@destroy']);

    /*Routes for contacts */
      Route::get('/contact',                   ['as' => 'contact',          'uses' =>   'ContactController@index']);
      Route::get('/contact/create',            ['as' => 'contact.create',   'uses' =>   'ContactController@create']);
      Route::get('/contact/edit/{id}',         ['as' => 'contact.edit',     'uses' =>   'ContactController@edit']);
      Route::post('/contact/update/{id}',      ['as' => 'contact.update',   'uses' =>   'ContactController@update']);
      Route::get('/contact/delete/{id}',       ['as' => 'contact.delete',   'uses' =>   'ContactController@destroy']);
  


    /* These are the routes for settings */
    Route::get('/settings',                   ['as' => 'settings',          'uses' =>   'SiteSettingsController@index']);
    // Route::get('/settings/create',            ['as' => 'settings.create',          'uses' =>   'SiteSettingsController@create']);
    // Route::post('/settings/store',            ['as' => 'settings.store',    'uses' =>   'SiteSettingsController@store']);
    Route::post('/settings/update/{id}',      ['as' => 'settings.update',   'uses' =>   'SiteSettingsController@update']);
    /*Dynamic menu */
    Route::get('/menus',                   ['as' => 'menus',          'uses' =>   'SiteSettingsController@menu']);

});


// These are the routes to register user
Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'namespace' => 'Auth\\', 'middleware' => ['auth']], function (){
    Route::get('/register',                    ['as' => 'register',  'uses' =>   'RegisterController@index']);
    Route::get('/register/create',             ['as' => 'register.create',  'uses' =>   'RegisterController@create']);
    Route::post('/register/store',             ['as' => 'register.store',  'uses' =>   'RegisterController@store']);
    Route::get('/register/show/{id}',          ['as' => 'register.show',  'uses' =>   'RegisterController@show']);
    Route::get('/register/edit/{id}',          ['as' => 'register.edit',  'uses' =>   'RegisterController@edit']);
    Route::post('/register/update/{id}',       ['as' => 'register.update',  'uses' =>   'RegisterController@update']);
    Route::get('/register/delete/{id}',        ['as' => 'register.delete',  'uses' =>   'RegisterController@destroy']);
});

Auth::routes();

Route::get('/register', 'Auth\RegisterController@index')->name('admin.register')->middleware('auth');
