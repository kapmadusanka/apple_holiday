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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::get('/add_student', 'StudentController@create')->name('add_student');
Route::post('/student_submit', 'StudentController@store')->name('student_submit');
Route::get('/student', 'StudentController@index')->name('student');
Route::get('/student_edit/{id}', 'StudentController@edit');
Route::get('/student_delete/{id}', 'StudentController@delete');


Route::get('/add_class', 'ClassController@create')->name('add_class');
Route::post('/class_submit', 'ClassController@store')->name('class_submit');
Route::get('/class', 'ClassController@index')->name('class');
Route::get('/class_edit/{id}', 'ClassController@edit');
Route::get('/class_delete/{id}', 'ClassController@delete');

Route::get('/parent', 'ParentController@index')->name('parent');
Route::get('/add_parent', 'ParentController@create')->name('add_parent');
Route::post('/parent_submit', 'ParentController@store')->name('parent_submit');
Route::get('/parent_edit/{id}', 'ParentController@edit');
Route::get('/parent_delete/{id}', 'ParentController@delete');



Route::get('/assign_parent', 'AssignParentController@index')->name('assign_parent');
Route::get('/add_assign_parent', 'AssignParentController@create')->name('add_assign_parent');
Route::post('/assign_parent_submit', 'AssignParentController@store')->name('assign_parent_submit');


Route::get('/older_than/{age}', 'SearchController@older_than');
Route::get('/older_than_and_parents/{student_age}/{parent_age}', 'SearchController@older_than_and_parents');
Route::get('/students_in_class/{class}/{year}', 'SearchController@students_in_class');
Route::get('/search_class_parents', 'SearchController@search_class_parents');
Route::post('/search_class_parent_submit', 'SearchController@search_class_parent_submit')->name('search_class_parent_submit');


Route::get('/send_mail', 'StudentController@send_email_form')->name('send_email');
Route::post('/send_email_submit', 'StudentController@send_mail')->name('send_email_submit');

