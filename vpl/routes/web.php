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
    return view('auth/login');
});

Auth::routes();

Route::post('/email_available/check', 'Auth\LoginController@email_available')->name('email_available.check');
Route::post('/current_password/check', 'Auth\ResetPasswordController@current_password_check')->name('current_password.check');
Route::post('/change-password', 'Auth\ResetPasswordController@change_password');

Route::group(['middleware' => ['auth']], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    //client
    Route::get('/request-vast-tag', 'ClientController@request_vast_tag');
    Route::post('/request-vast-tag', 'ClientController@post_vast_tag');
    
    // Route::get('/vast-tag', '')
    
    //staff
    Route::get('/companylist', 'StaffController@clientlist')->middleware('auth');
    Route::get('/userlist', 'StaffController@userlist');
    Route::get('/create/user', 'StaffController@create_user');
    Route::get('/create/company', 'StaffController@create');
    Route::post('/create/company', 'StaffController@save');
    Route::get('/publisherlist', 'StaffController@publisherlist');
    Route::get('/create/publisher', 'StaffController@create_publisher');
    Route::get('/adlist', 'StaffController@adlist');
    Route::get('/create/advertiser', 'StaffController@create_advertiser');
    Route::get('/websitelist', 'StaffController@websitelist');
    Route::get('/feedlist', 'StaffController@feedlist');
    Route::get('/vast-tag-admin', 'PlayerListsController@index')->name('admin');
    Route::get('/player/edit/{id}', 'PlayerListsController@edit')->name('player.edit');
    Route::post('playerUpdate', 'PlayerListsController@SavePlayer');
    Route::post('/player/delete/{id}', 'PlayerListsController@destroy')->name('player.delete');
    Route::post('savePlayer', 'HomeController@SavePlayer')->name('savePlayer.post');
    Route::get('/player/{id}/{p}', 'PlayerController@index')->name('player.iframe');
    Route::post('/getplayerInfo', 'PlayerListsController@getInfo')->name('getplayerInfo');

    Route::post('/vast-tag/accept/{id}', 'StaffController@accept_vast_tag');
    Route::post('/vast-tag/delete/{id}', 'StaffController@delete_vast_tag');
    Route::post('/getrequestinfo', 'StaffController@getrequestInfo')->name('getrequestinfo');
});