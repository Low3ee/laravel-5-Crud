<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/std', 'StudentController@ajaxDisplay')->name('students.ajaxrq');
// returns the home page with all students
Route::get('/', 'StudentController@index')->name('students.index');
// returns the form for adding a student
Route::get('/students/create','StudentController@create')->name('students.create');
// adds a student to the database
Route::post('/students', 'StudentController@store')->name('students.store');
// returns a page that shows a full student
Route::get('/students/profile/{student}', 'StudentController@show')->name('students.show');
// returns the form for editing a student
Route::get('/students/{student}/edit', 'StudentController@edit')->name('students.edit');
// updates a student
Route::put('/students/{student}', 'StudentController@update')->name('students.update');
// deletes a student
Route::delete('/students/delete/{student}', 'StudentController@destroy')->name('students.destroy');
