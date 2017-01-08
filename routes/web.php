<?php

/*
|--------------------------------------------------------------------------
| Public Area Routes
|--------------------------------------------------------------------------
|
*/

Route::get('test' , 'TestController@index');

Route::group(['namespace' => 'Front', 'middleware' => ['Subdomain', 'UserIpDetect']], function () {
	// test
    Route::get('/hadi', 'UserController@test');
    Route::post('/hadi', 'FrontController@test2');

    Route::get('/', 'FrontController@index');
	Route::post('/register/new', 'FrontController@register');
	Route::get('/register/confirm/{hash}', 'UserController@register_confirm');
	Route::get('/pages/{slug}/{title?}', 'FrontController@pages');
    Route::get('/contact', 'FrontController@contact');
    Route::get('/faq', 'FrontController@faq');
    Route::get('/news', 'FrontController@news');
    Route::get('/products', 'FrontController@products');
    Route::get('/products/show/{id}', 'FrontController@show_products');

    Route::group(['middleware' => 'auth'], function (){
        Route::get('/profile', 'UserController@profile');
        Route::get('/user/edit', 'UserController@user_edit');
        Route::get('/user/password', 'UserController@user_password');
        Route::post('/user/password', 'UserController@user_password_set');
    });
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();
Route::get('home', 'Front\FrontController@redirectUsersAfterLogin');
Route::get('logout', 'Front\FrontController@logout');

/*
|--------------------------------------------------------------------------
| Routes for Registered Users
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| Routes for Admins
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'manage', 'middleware' => ['auth', 'can:admin'], 'namespace' => 'Manage'], function () {
	Route::get('/', 'ManageController@index');
	Route::get('index', 'ManageController@index');
	//    Route::get('upstream' , 'UpstreamController@index') ;


	/*
	| Calendar
	*/

	Route::group(['prefix'=>'calendar'] , function() {
		Route::get('/' , 'CalendarController@index');
		Route::get('/month/{year?}/{month?}/{day?}' , 'CalendarController@index');

		Route::get('entry/new/{handle_id}/{year?}/{month?}/{day?}' , 'CalendarController@entryNew');
		Route::group(['prefix'=>'save'] , function() {
			Route::post('/entry' , 'CalendarController@entrySave');
			Route::post('/entry_first_step' , 'CalendarController@entryFirstStep');
		});
	});

	/*
	| Posts
	*/
	Route::group(['prefix'=>'posts'] , function() {
		Route::get('/update/{item_id}' , 'PostsController@update');
		Route::get('/{branch_slug}' , 'PostsController@browse') ;
		Route::get('{branch_slug}/edit/{post_id}' , 'PostsController@editor');
		Route::get('{branch_slug}/searched' , 'PostsController@searchResult');
		Route::get('{branch_slug}/search' , 'PostsController@searchPanel');
		Route::get('/{branch_slug}/{request_tab}/{request_category?}' , 'PostsController@browse') ;

		Route::group(['prefix'=>'save'] , function() {
			Route::post('/' , 'PostsController@save');
			Route::post('/hard_delete' , 'PostsController@hard_delete');
		});
	});

	/*
	| Admins
	*/

	Route::group(['prefix'=>'admins', 'middleware' => 'can:super'] , function() {
		Route::get('/update/{item_id}' , 'AdminsController@update');
		Route::get('/' , 'AdminsController@browse') ;
		Route::get('/browse/{request_tab?}' , 'AdminsController@browse') ;
		Route::get('/create/' , 'AdminsController@editor') ;
		Route::get('/search' , 'AdminsController@search');
//		Route::get('/reports' , 'AdminsController@reports');
		Route::get('/{user_id}/edit' , 'AdminsController@editor');
		Route::get('/{user_id}/{modal_action}' , 'AdminsController@modalActions');

		Route::group(['prefix'=>'save'] , function() {
			Route::post('/' , 'AdminsController@save');

			Route::post('/change_password' , 'AdminsController@change_password');
			Route::post('/soft_delete' , 'AdminsController@soft_delete');
			Route::post('/undelete' , 'AdminsController@undelete');
			Route::post('/hard_delete' , 'AdminsController@hard_delete');
			Route::post('/permits' , 'AdminsController@permits');
		});
	});

	/*
	| SuperAdmin Settings
	*/
		Route::group(['prefix'=>'settings'  , 'middleware' => 'can:super'], function() {
			Route::get('/' , 'SettingsController@index') ;

			Route::get('/categories/new/{branch_slug}/{parent_id}' , 'SettingsController@newCategory') ;
			Route::get('/categories/edit/{item_id}' , 'SettingsController@editCategory') ;
			Route::get('/categories/{branch_slug}/{parent_id?}' , 'SettingsController@categories') ;

			Route::get('/handles' , 'SettingsController@handles');
			Route::get('/handles/edit/{item_id}' , 'SettingsController@editHandle');
			Route::get('/handles/fields/{item_id}' , 'SettingsController@fields');
			Route::get('/handles/fields/edit/{item_id}' , 'SettingsController@editField');
			Route::get('/handles/fields/{handle_id}/new' , 'SettingsController@newField');

			Route::get('/{request_tab}/' , 'SettingsController@index') ;

			Route::group(['prefix'=>'save'] , function() {
				Route::post('/' , 'settingsController@save');
				Route::post('/category' , 'settingsController@saveCategory');
				Route::post('/handle' , 'settingsController@saveHandle');
				Route::post('/field' , 'settingsController@saveField');
			});


		});

	/*
	| Upstream Settings
	*/

	Route::group(['prefix' => 'upstream', 'middleware_' => 'can:developer'] , function() {
		Route::get('/{request_tab?}' , 'UpstreamController@index') ;
		Route::get('/{request_tab}/search/{keyword}' , 'UpstreamController@search') ;
		Route::get('/edit/{request_tab?}/{item_id?}/{parent_id?}' , 'UpstreamController@editor') ;
		Route::get('/{request_tab}/{item_id}/{parent_id?}' , 'UpstreamController@item') ;

		Route::group(['prefix' => 'save'] , function() {
			Route::post('state' , 'UpstreamController@saveProvince');
			Route::post('city' , 'UpstreamController@saveCity');
			Route::post('branch' , 'UpstreamController@saveBranch');
			Route::post('department' , 'UpstreamController@saveDepartment');
			Route::post('category' , 'UpstreamController@saveCategory');
			Route::post('downstream' , 'UpstreamController@saveDownstream');
			Route::post('downstream_value' , 'UpstreamController@setDownstream');
			Route::post('login_as' , 'UpstreamController@loginAs');
		});
	});
});

/*
|        | POST     | login                        |                      | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | GET|HEAD | login                        | login                | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST     | logout                       |                      | App\Http\Controllers\Auth\LoginController@logout                       | web          |
|        | POST     | password/email               |                      | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
|        | POST     | password/reset               |                      | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
|        | GET|HEAD | password/reset               |                      | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
|        | GET|HEAD | password/reset/{token}       |                      | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
 */