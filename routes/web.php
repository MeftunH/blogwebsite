<?php

/*
|--------------------------------------------------------------------------
| Backend roots
|--------------------------------------------------------------------------

*/
Route::get('nonactive',function()
{
    return view('front.offline');
});
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function()
{
    Route::get('login','Back\AuthController@login')->name('login');
    Route::post('login','Back\AuthController@loginPost')->name('login.post');
});
Route::get('admin/login','Back\AuthController@login')->name('admin.login');
Route::post('admin/login','Back\AuthController@loginPost')->name('admin.login.post');
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function()
{

Route::get('panel','Back\Dashboard@index')->name('dashboard');
//Article roots
Route::get('articles/deleted','Back\ArticleController@trashed')->name('trashed.article');

Route::resource('articles','Back\ArticleController');
Route::get('/switch','Back\ArticleController@switch')->name('switch');
Route::get('/deletearticle/{id}','Back\ArticleController@delete')->name('delete.article');
Route::get('/harddeletearticle/{id}','Back\ArticleController@harddelete')->name('hard.delete.article');
Route::get('/recoverarticle/{id}','Back\ArticleController@recover')->name('recover.article');
//category roots
Route::get('/categories','Back\CategoryController@index')->name('category.index');
Route::post('/categories/create','Back\CategoryController@create')->name('category.create');
Route::post('/categories/update','Back\CategoryController@update')->name('category.update');
Route::post('/categories/delete','Back\CategoryController@delete')->name('category.delete');
Route::get('/category/status','Back\CategoryController@switch')->name('category.switch');
Route::get('/category/getData','Back\CategoryController@getData')->name('category.getdata');
//Page roots
Route::get('/pagens','Back\PageController@index')->name('page.index');
Route::get('/pagens/create','Back\PageController@create')->name('page.create');
Route::get('/pagens/updates/{id}','Back\PageController@update')->name('page.edit');
Route::post('/pagens/updates/{id}','Back\PageController@updatePost')->name('page.edit.post');
Route::post('/pagens/create','Back\PageController@post')->name('page.create.post');
Route::get('/page/switch','Back\PageController@switch')->name('page.switch');
Route::get('/page/delete/{id}','Back\PageController@delete')->name('page.delete');
Route::get('/page/order','Back\PageController@orders')->name('page.orders');
//configs

Route::get('/settings','Back\ConfigController@index')->name('config.index');
Route::post('/settings/update','Back\ConfigController@update')->name('config.update');

//
Route::get('logout','Back\AuthController@logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Front roots
|--------------------------------------------------------------------------

*/
Route::get('/categories/{category}','Front\Homepage@category')->name('category');
Route::get('/', 'Front\Homepage@index')->name('homepage');
Route::get('/contact','Front\Homepage@contact')->name('contact.post');
Route::post('/contact','Front\Homepage@contactpost');
Route::get('page','Front\Homepage@index');

Route::get('/{category}/{slug}','Front\Homepage@single')->name('single');
Route::get('/{page}','Front\Homepage@page')->name('page');


