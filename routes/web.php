<?php

/*
|=============================
|      --/Visitor Area /--      
|=============================
*/
Route::get('/', function () { return view('welcome'); });
Route::get('/home', 'HomeController@index')->name('home');


/*
|=============================
|  --/Register and sign in/-- 
|=============================
*/

Auth::routes();

/*
|=============================
|      --/Admin Area /--      
|=============================
*/
Route::prefix('admin')->group(function()
{
  Route::get( '/dashboard', 'AdminController@dashboard')->name("Dashboard");
  Route::get( '/links', 'AdminController@links')->name("links");
  Route::get( '/withdraw', 'AdminController@withdraw')->name("withdraw");
  Route::get( '/referrals', 'AdminController@referrals')->name("referrals");
  Route::get( '/profile', 'AdminController@profile')->name("profile");
  Route::get( '/users', 'AdminController@users')->name("users");
});
/*
|=============================
|      --/Manager Area /--      
|=============================
*/
Route::prefix('manager')->group(function()
{
  Route::get( '/dashboard', 'ManagerController@dashboard')->name("Dashboard");
  Route::get( '/links', 'ManagerController@links')->name("links");
  Route::get( '/withdraw', 'ManagerController@withdraw')->name("withdraw");
  Route::get( '/referrals', 'ManagerController@referrals')->name("referrals");
  Route::get( '/profile', 'ManagerController@profile')->name("profile");
  Route::get( '/users', 'ManagerController@users')->name("users");
});
/*
|=============================
|      --/User Area /--      
|=============================
*/
Route::prefix('user')->group(function()
{
  Route::get( '/dashboard', 'UsersController@dashboard')->name("Dashboard");
 
  Route::prefix('links')->group(function()
   {
     Route::get( '/', 'UsersController@links')->name("links");
     Route::get( '/add', 'UsersController@addlink')->name("addlink");
     Route::get( '/edit', 'UsersController@editlink')->name("editlink");
     Route::get( '/delete', 'UsersController@deletelink')->name("deletelink");
  });
   Route::prefix('files')->group(function()
   {
     Route::get( '/', 'UsersController@files')->name("files");
     Route::get( '/add', 'UsersController@addfile')->name("addfile");
     Route::get( '/edit', 'UsersController@editfile')->name("editfile");
     Route::get( '/delete', 'UsersController@deletefile')->name("deletefile");
  });

  Route::get( '/referrals', 'UsersController@referrals')->name("referrals");
  Route::get( '/withdraw', 'UsersController@withdraw')->name("withdraw");
});

Route::prefix('user/account')->group(function()
{
  Route::get( '/profile', 'UsersController@profile')->name("profile");
  Route::get( '/change-password', 'UsersController@changepassword')->name("changepassword");
  // Route::get( '/change-email', 'UsersController@changeemail')->name("changeemail");
});

/*
|=============================
|      --/Settings Area /--      
|=============================
*/
  Route::get( '/change-password', 'ManagerController@changepassword')->name("changepassword");
  Route::get( '/change-email', 'ManagerController@changeemail')->name("changeemail");

