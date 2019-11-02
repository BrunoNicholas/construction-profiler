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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:super-admin|admin']], function(){
		Route::resource('/roles', 'RoleController');
		/*
		 * closure pages
		 */
		Route::get('/', [
			'as' 	=> 'admin',
			'uses'	=> 'AdminPageController@index',
		]);
	}
);

Route::group(['prefix'	=> 'admin', 'middleware'	=> ['auth']], function()
	{
		Route::resource('/users', 'UserController');
	}
);

Route::group(['prefix' => 'home', 'middleware' => ['auth','verified']], function(){
	Route::resource('departments', 'DepartmentController');
	Route::resource('department/projects', 'ProjectController');
	Route::resource('department/questions', 'QuestionController');
	Route::resource('department/project/posts', 'PostController');
	Route::resource('{type}/{id}/comments', 'CommentController');
	// closures
	Route::get('/user/profile/settings', [
		'as' 	=> 'settings',
		'uses'	=> 'UserPageController@settings',
	]);
	Route::get('/user/profile', [
		'as' 	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
	Route::post('/user/profile', [
		'as'	=> 'profile.update',
		'uses'	=> 'UserPageController@update_image'
	]);
	Route::post('/user/password/profile', [
		'as'	=> 'password.update',
		'uses'	=> 'UserController@changePassword'
	]);
});

Route::group(['prefix' => 'web', 'middleware' => 'web'], function(){
	Route::get('/', [
		'as' 	=> 'welcome',
		'uses'  => function () {
		    return view('welcome');
		}
	]);
	Route::get('help-&-conditions', [
		'as' 	=> 'terms',
		'uses'  => function () {
		    return view('web.terms');
		}
	]);
});

// test ones
Route::get('test', function(){
	return view('layouts.site');
});