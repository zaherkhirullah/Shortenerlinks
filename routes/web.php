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

Route::group(['namespace' => 'Users'], function(){
Route::get('/contacts', 'ContactsController@create')->name('contacts.create');
Route::post('/contacts', 'ContactsController@store')->name('home.contacts.store');
});

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
   
    Route::get( '/links/dlist', 'LinkController@deletedLinks')->name("links.deletedLinks");
    Route::post( '/links/restore/{link}',array('uses' => 'LinkController@restore', 'as' => 'links.restore'));
    
    Route::get( '/files/dlist', 'FileController@deletedFiles')->name("files.deletedFiles");
    Route::get( '/files/private', 'FileController@private')->name("files.private");
    Route::get( '/files/public', 'FileController@public')->name("files.public");
    Route::post( '/files/restore/{file}',array('uses' => 'FileController@restore', 'as' => 'files.restore'));
   
    Route::get( '/folders/dlist', 'FolderController@deletedFolders')->name("links.deletedFolders");
    Route::post( '/folders/restore/{folder}',array('uses' => 'FolderController@restore', 'as' => 'links.restore'));

   
    Route::resource( '/domains', 'DomainController');  
    Route::resource( '/adstypes', 'AdstypesController');
    Route::resource( '/folders', 'FolderController');
    Route::resource( 'links', 'LinkController');
    Route::resource( '/files', 'FileController');
    Route::resource( '/contacts', 'ContactsController');
    Route::resource( '/users', 'UserController');  
    Route::resource( '/roles', 'RoleController');  



    
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
     Route::get( '/', 'UsersController@dashboard')->name("user");
     Route::get( '/dashboard', 'UsersController@dashboard')->name("dashboard");

     Route::get( '/referrals', 'UsersController@referrals')->name("referrals");
     Route::get( '/withdraw', 'UsersController@withdraw')->name("withdraw");

     Route::get( '/links/dlist', 'LinkController@deletedLinks')->name("links.deletedLinks");
     Route::delete( '/links/restore/{link}',array('uses' => 'LinkController@restore', 'as' => 'links.restore'));
     
     Route::get( '/files/dlist', 'FileController@deletedFiles')->name("files.deletedFiles");
     Route::delete( '/files/restore/{file}',array('uses' => 'FileController@restore', 'as' => 'files.restore'));
     
     Route::resource( '/folder', 'FolderController'); 
     Route::resource( '/link', 'LinkController');  
     Route::resource( '/file', 'FileController');

  
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
