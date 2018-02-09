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

Route::get('/', function () { return view('home.home'); });
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rates', 'HomeController@rates')->name('rates');
Route::get('/contacts', 'ContactsController@create')->name('create');
Route::post('/contacts', 'ContactsController@store')->name('contacts.store');
  
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
    Route::get( '/', 'AdminController@dashboard')->name("admin");
    Route::get( '/dashboard', 'AdminController@dashboard')->name("Adashboard");
    Route::get( '/withdraws', 'AdminController@withdraws')->name("Awithdraws");
    Route::get( '/users', 'AdminController@users')->name("Ausers");
    Route::resource( '/domains', 'DomainController');  
    Route::resource( '/adstypes', 'AdsTypesController');
    Route::resource( '/folders', 'FolderController');
    Route::resource( '/links', 'LinkController');  
    Route::resource( '/files', 'FileController');
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
    Route::get( '/', 'UsersController@dashboard')
    ->name("user");
    Route::get( '/dashboard', 'UsersController@dashboard')
    ->name("dashboard");

      Route::get( '/referrals', 'UsersController@referrals')
                ->name("referrals");
      Route::get( '/withdraw', 'UsersController@withdraw')
                ->name("withdraw");

      Route::resource( '/folders', 'FolderController'); 
      Route::resource( '/links', 'LinkController');  
      Route::resource( '/files', 'FileController');
    });
      
     
       

});

Route::prefix('account')->group(function()
{
  Route::group(['namespace' => 'Account'], function()
  {
    Route::get( '/profile', 'AccountController@profile')->name("profile");
    Route::get( '/changePassword', 'AccountController@showchangePassword')->name("showchangePassword");
    Route::post('/changePassword','AccountController@changePassword')->name('changePassword');
    Route::get( '/change-email', 'AccountController@changeemail')->name("changeemail");
  });
});

/*
|=============================
|      --/Settings Area /--      
|=============================
*/
