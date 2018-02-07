<?php

/*
|=============================
|      --/LanguageContrroler /--      
|=============================
*/
Route::post('/changelang', 'LanguageController@changelang')->name('changelang');

Route::post('/language/', array('before' =>'csrf',
                                'as'=>'changelang',
                                'uses'=>'LanguageController@changelang',)
      );

/*
|=============================
|      --/Visitor Area /--      
|=============================
*/
// Route::get('/{locale}', function ($locale) { 
//  App::setLocale($locale); 
//   return view('home.home'); 
// });
Route::get('/', function () { 
  return view('home.home'); 
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rates', 'HomeController@rates')->name('rates');

   

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
  Route::group(['namespace' => 'Admin'], function()
  {
    Route::get( '/dashboard', 'AdminController@dashboard')->name("Adashboard");
    Route::get( '/links', 'AdminController@links')->name("Alinks");
    Route::get( '/files', 'AdminController@files')->name("Afiles");
    Route::get( '/withdraws', 'AdminController@withdraws')->name("Awithdraws");
    Route::get( '/users', 'AdminController@users')->name("Ausers");
  });
});
/*
|=============================
|      --/Manager Area /--      
|=============================
*/
// Route::prefix('manager')->group(function()
// {
//   Route::group(['namespace' => 'Manager'], function()
//   {
//     Route::get('/dashboard','ManagerController@dashboard')->name("Mdashboard");
//     Route::get('/links','ManagerController@links')->name("Mlinks");
//     Route::get('/withdraw','ManagerController@withdraw')->name("Mwithdraw");
//     Route::get('/referrals','ManagerController@referrals')->name("Mreferrals");
//     Route::get('/profile', 'ManagerController@profile')->name("Mprofile");
//     Route::get('/users', 'ManagerController@users')->name("Musers");
//   });
// });
/*
|=============================
|      --/User Area /--      
|=============================
*/
Route::prefix('user')->group(function() 
{
   Route::group(['namespace' => 'Users'], function(){

      Route::get( '/dashboard', 'UsersController@dashboard')
                ->name("dashboard");

      Route::get( '/referrals', 'UsersController@referrals')
                ->name("referrals");
      Route::get( '/withdraw', 'UsersController@withdraw')
                ->name("withdraw");
       });
      
        Route::resource( '/links', 'LinkController');  
        Route::resource( '/files', 'FileController');
       

});

Route::prefix('account')->group(function()
{
  Route::group(['namespace' => 'Account'], function()
  {
    Route::get( '/profile', 'AccountController@profile')
            ->name("profile");
    Route::get( '/change-password', 'AccountController@changepassword')
            ->name("changepassword");
    Route::get( '/change-email', 'AccountController@changeemail')
            ->name("changeemail");
  });
});

/*
|=============================
|      --/Settings Area /--      
|=============================
*/
  // Route::get( '/change-password', 'ManagerController@changepassword')
  //        ->name("changepassword");
  // Route::get( '/change-email', 'ManagerController@changeemail')
  //        ->name("changeemail");

