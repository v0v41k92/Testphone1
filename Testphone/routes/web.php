<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/add_contact', function () {
    return view('add_contact');
})->name('contact');
Route::get('/search', function () {
    return view('search');
})->name('search');


Route::get('/add_contact','App\Http\Controllers\GroupController@allData1')->name('contact');

Route::get('/contact/update={id}', 'App\Http\Controllers\ContactController@contactUpdate')->name('contact-update');
Route::get('/contact/delete={id}', 'App\Http\Controllers\ContactController@contactDelete')->name('contact-delete');

Route::post('/contact/update={id}', 'App\Http\Controllers\ContactController@contactUpdateSucces')->name('contact-update-succes');

Route::get('/contact/edit={id}', 'App\Http\Controllers\ContactController@contactEdit')->name('contact-edit');
Route::get('/', 'App\Http\Controllers\ContactController@allData','App\Http\Controllers\ContactController@GroupSelectedAction')->name('home');


Route::get('/xml', 'App\Http\Controllers\ContactController@createXMLAction');

Route::get('/loadfromxml','App\Http\Controllers\ContactController@loadfromxmlAction');
Route::post('/loadfromxml','App\Http\Controllers\ContactController@loadfromxmlAction');

Route::post('/add_contact/submit', 'App\Http\Controllers\ContactController@submit')->name('contact-form');

Route::get('/search', 'App\Http\Controllers\ContactController@Search')->name('search');
Route::get('/group', 'App\Http\Controllers\ContactController@SearchGroup')->name('group');
Route::post('/group', 'App\Http\Controllers\ContactController@allData')->name('group');

Route::get('/uploadfile','App\Http\Controllers\UploadFileController@index','App\Http\Controllers\ContactController@uploadFile')->name('upload');
Route::post('/uploadfile','App\Http\Controllers\UploadFileController@showUploadFile', 'App\Http\Controllers\ContactController@loadfromxmlAction');
