<?php

/*
|=============================
|      --/ Settings Area /--      
|=============================
*/
Route::prefix('settings')->group(function()
  {
  Route::group(['namespace' => 'Settings'], function()
  {
    Route::get( '/', 'OptionsController@index')->name("settings");
    Route::post( '/', 'OptionsController@update')->name("Psettings");
    Route::post('/changelang', 'LanguageController@changelang')->name('changelang');
    Route::post('/language', array('before' =>'csrf','as'=>'changelang',
                                    'uses'=>'LanguageController@changelang',));
                          
                                    
    Route::get('lang/{lang}', 'LanguageController@index')->name('lang');
  });
});

/*
|=============================
|      --/ Admin Area /--      
|=============================
*/
Route::prefix('admin')->group(function()
{ 
  Route::group(['namespace' => 'Admin'], function()
  {
     // Admin 
    Route::get( '/', 'AdminController@dashboard')->name("admin");
    Route::get( '/dashboard', 'AdminController@dashboard')->name("admin.dashboard");
    // Route::get( '/withdraws', 'AdminController@withdraws')->name("admin.withdraws");
   
    // Admin links
    Route::get( '/links/dlist', 'LinkController@deletedLinks')->name("links.deletedLinks");
    Route::post( '/links/{link}/restore',array('uses' => 'LinkController@restore',
                                               'as' => 'links.restore'));
    Route::delete( '/links/{link}/delete',array('uses' => 'LinkController@delete',
                                               'as' => 'links.delete'));
    // Admin Files
    Route::get( '/files/dlist', 'FileController@deletedFiles')->name("files.deletedFiles");
    Route::get( '/files/private', 'FileController@private')->name("files.private");
    Route::get( '/files/public', 'FileController@public')->name("files.public");
    Route::post( '/files/{file}/restore',array('uses' => 'FileController@restore', 
                                               'as'   => 'files.restore'));
    Route::delete( '/files/{file}/delete',array('uses' => 'FileController@delete', 
    'as'   => 'files.delete'));
    // Admin Folders
    Route::get( '/folders/dlist', 'FolderController@deletedFolders')->name("folders.deletedFolders");
    Route::delete( '/folders/{folder}/restore',array('uses' => 'FolderController@restore', 
                                                   'as'   => 'folders.restore'));
    // Admin Resources
    Route::resource( '/users',      'UserController');  
    Route::resource( '/roles',      'RoleController');
    Route::resource( '/domains',    'DomainController');  
    Route::resource( '/adstypes',   'AdstypesController');
    Route::resource( '/PayMethods', 'PayMethodController'); 
    Route::resource( '/contacts',   'ContactsController');
    Route::resource( '/folders',    'FolderController');
    Route::resource( '/links',      'LinkController');
    Route::resource( '/files',      'FileController');
    Route::resource( '/tickets',      'TicketController');
    Route::resource( '/withdraws',      'WithdrawsController');
   
  });
 

});
/*
|=============================
|      --/User Area /--      
|=============================
*/
Route::prefix('user')->group(function() 
{
  Route::group(['namespace' => 'Users'], function()
  {
    // Users
     Route::get( '/', 'UsersController@dashboard')->name("user");
     Route::get( '/dashboard', 'UsersController@dashboard')->name("user.dashboard");
    //  Referals & withdraws
     Route::get( '/referrals', 'UsersController@referrals')->name("user.referrals");
    //  Route::get( '/withdraw', 'UsersController@withdraw')->name("user.withdraws");
    
     // Users Links
     Route::get( '/link/dlist', 'LinkController@deletedLinks')->name("link.deletedLinks");
     Route::delete( '/link/restore/{link}',array('uses' => 'LinkController@restore', 
                                               'as' => 'link.restore'));
     // Users Files
     Route::get( '/file/dlist', 'FileController@deletedFiles')->name("file.deletedFiles");
     Route::delete( '/file/restore/{file}',array('uses' => 'FileController@restore', 
                                               'as' => 'file.restore'));
     // Users Recources
     Route::resource( '/folder', 'FolderController'); 
     Route::resource( '/link',   'LinkController');  
     Route::resource( '/file',   'FileController');
     Route::resource( '/ticket',  'TicketController');
     Route::resource( '/withdraw','WithdrawController');

    });
});

/*
|=============================
|      --/Account Area /--      
|=============================
*/

Route::prefix('account')->group(function()
{
  Route::group(['namespace' => 'Account'], function()
  {
    Route::get(  '/profile',        'AccountController@showprofile')->name("account.profile");
    Route::post( '/profile',        'AccountController@profile')->name("account.Pprofile");
    Route::get( '/changePassword',  'AccountController@showchangePassword')->name('account.changePassword');;
    Route::post('/changePassword', 'AccountController@changePassword')->name('account.PchangePassword');
    Route::get( '/change-email',    'AccountController@changeemail')->name("changeemail");
  });
});

// Route::get('/{locale}', function ($locale) { 
//  App::setLocale($locale); 
//   return view('home.home'); 
// });


/*
|=============================
|      --/Visitor Area /--      
|=============================
*/


Route::group(['namespace' => 'Home'], function()
{
  // home page
  Route::get('/', 'HomeController@index')->name('homepage');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/rates', 'HomeController@rates')->name('rates');
  Route::get('/terms', 'HomeController@terms')->name('terms');
  
  // error pages
  Route::get('/error', 'ErrorController@error')->name('error');
  Route::get('/Notfound', 'ErrorController@Notfound')->name('Notfound');
  Route::get('/error/{value}', 'ErrorController@error_v')->name('error_v');
  Route::get('/Notfound/{value}', 'ErrorController@Notfound_v')->name('Notfound_v');
  
  // contacts
  Route::get('/contacts', 'ContactsController@create')->name('home.contacts.create');
  Route::post('/contacts', 'ContactsController@store')->name('home.contacts.store');

  // captcha link
  Route::get('/l/{slug}', 'HomeController@visitLink')->name('visitLink');
  Route::get('/Fc/l/{slug}', 'HomeController@Fc_visitLink')->name('Fc_visitLink');
  Route::get('/l/g/{slug}', 'HomeController@getLink')->name('getLink');
  Route::post('/l/go/{slug}', 'HomeController@goToLink')->name('goLink');

  // captcha file
  Route::get('/f/{slug}', 'HomeController@visitFile')->name('visitFile');
  Route::get('/Fc/f/{slug}', 'HomeController@Fc_visitFile')->name('Fc_visitFile');
  Route::get('/f/g/{slug}', 'HomeController@getFile')->name('getFile');
  Route::post('/f/dow/{slug}', 'HomeController@downloadFile')->name('downloadFile');
  Route::post('/f/go/{slug}', 'HomeController@goToFile')->name('goFile');
});



/*
|=============================
|  --/ Authouraization /-- 
|=============================
*/

Auth::routes();

Route::group(['namespace' => 'Auth'], function()
{
  Route::get('/register/?ref={ref}', 'RegistersUsers@showRegistrationForm')->name('refRegister');
   Route::post('/register/?ref={ref}', 'RegistersUsers@showRegistrationForm')->name('refRegister');
});
// Route::get('ip', function () {
// 	$ip = '66.102.0.0';
//     $data = \Location::get($ip);
//     dd($data);
// });
