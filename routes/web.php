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

Route::pattern('slug', '[a-z0-9- _]+');

//Route::group([ 'namespace'=>'Admin'], function () {

# Home route
Route::get('/', 'HomeController@getWelcome')->name('home');

Route::group(['middleware' => ['web']], function () {
    Route::get('/switch_lang/{lang}', 'ChangeLanguageController@switchLang')->name('switch');
});

# Lock screen
Route::get('{id}/lockscreen', 'UsersController@lockscreen')->name('lockscreen');
Route::post('{id}/lockscreen', 'UsersController@postLockscreen')->name('lockscreen');
# All basic routes defined here
Route::get('login', 'AuthController@getSignin')->name('login');
Route::get('signin', 'AuthController@getSignin')->name('signin');
Route::post('signin', 'AuthController@postSignin')->name('postSignin');
Route::post('signup', 'AuthController@postSignup')->name('signup');
Route::post('forgot-password', 'AuthController@postForgotPassword')->name('signup');

# Register routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@user_registration');
Route::post('simple/register', 'Auth\RegisterController@simple_user_registration')->name('simple.register');

# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

# Logout
Route::get('logout', 'AuthController@getLogout')->name('logout');

# Account Activation
Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
//});


Route::group([ 'middleware' => 'admin'], function () {
    # GUI Crud Generator
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\x@generate')->name('generate');
    Route::post('modelCheck', 'ModelcheckController@modelCheck');
    # Dashboard / Index
    Route::get('/index', 'JoshController@showHome')->name('dashboard');
    # crop demo
    Route::post('crop_demo', 'JoshController@crop_demo')->name('crop_demo');
    # Activity log
    Route::get('activity_log', 'JoshController@ActivityLog')->name('activity_log');
    Route::get('task/data', 'TaskController@data')->name('data');
    # User Management
    Route::group([ 'prefix' => 'users'], function () {
        Route::get('data', 'UsersController@data')->name('users.data');
        Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
        Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
        Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
        Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
    });
    Route::resource('users', 'UsersController');

    Route::group([ 'prefix' => 'templates'], function () {
        Route::get('data', 'TemplateController@data')->name('templates.data');
        Route::get('{template}/delete', 'TemplateController@destroy')->name('templates.delete');
        Route::get('{template}/confirm-delete', 'TemplateController@getModalDelete')->name('templates.confirm-delete');
        Route::get('{template}/assign', 'TemplateController@assign')->name('templates.assign');
    });
    Route::resource('templates', 'TemplateController');

    Route::group([ 'prefix' => 'forms'], function () {
        Route::get('data', 'FormsController@data')->name('forms.data');
        Route::post('addControls', 'FormsController@addFormControl')->name('forms.controls');
        Route::get('{form}/delete', 'FormsController@destroy')->name('forms.delete');
        Route::get('{form}/confirm-delete', 'FormsController@getModalDelete')->name('forms.confirm-delete');
    });
    Route::resource('forms', 'FormsController');

    Route::get('deleted_users',['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

    # Group Management
    Route::group(['prefix' => 'groups'], function () {
        Route::get('{group}/delete', 'GroupsController@destroy')->name('groups.delete');
        Route::get('{group}/confirm-delete', 'GroupsController@getModalDelete')->name('groups.confirm-delete');
        Route::get('{group}/restore', 'GroupsController@getRestore')->name('groups.restore');
    });
    Route::resource('groups', 'GroupsController');

    Route::get('{name?}', 'JoshController@showView');
});

# Remaining pages will be called from below controller method
# in real world scenario, you may be required to define all routes manually

Route::get('activate/{userId}/{activationCode}','FrontEndController@getActivate')->name('activate');
Route::get('forgot-password','FrontEndController@getForgotPassword')->name('forgot-password');
Route::post('forgot-password', 'FrontEndController@postForgotPassword');

# Forgot Password Confirmation
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
Route::get('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@getForgotPasswordConfirm')->name('forgot-password-confirm');



