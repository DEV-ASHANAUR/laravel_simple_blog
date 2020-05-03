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

// Route::get('/', function () {
//     return view('pages.index');
// });
Route::get('/','hellocontroler@index');

Route::get('/about','hellocontroler@about');
Route::get(md5('contact us'), 'hellocontroler@contact')->name('contact');
// category crud here
Route::get(md5('addcategory'), 'bolocontroler@addcategory')->name('add.category');
Route::get(md5('allcategory'), 'bolocontroler@allcategory')->name('all.category');
Route::post(md5('store.category'), 'bolocontroler@Storecategory')->name('store.category');
Route::get('view/category/{id}','bolocontroler@viewcategory');
Route::get('delete/category/{id}','bolocontroler@deletecategory');
Route::get('edit/category/{id}','bolocontroler@editcategory');
Route::post('update/category/{id}','bolocontroler@updatecategory');
// post crud here
Route::get(md5('write post'), 'postblog@writepost')->name('writepost');
Route::post(md5('store.post'), 'postblog@StorePost')->name('store.post');
Route::get(md5('all.post'), 'postblog@allpost')->name('all.post');
Route::get('view/post/{id}','postblog@viewpost');
Route::get('delete/post/{id}','postblog@deletepost');
Route::get('edit/post/{id}','postblog@editpost');
Route::post('update/post/{id}','postblog@updatepost');