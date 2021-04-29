<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;


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

//Route::get('/user', 'UserController@index')->name('user');
Route::get('/test', 'TestController@index')->name('test');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $path = public_path('files');
    $files = File::allfiles($path);
    /App/Models/File
    return view('dashboard', compact('files', ));
})->name('dashboard');
/*Route::post('files/{id}', function ($id) {
    return back();
});*/

//Route::post('/searchfiles', 'FileSearchController@store');
Route::post('searchfiles', 'FileSearchController@search');
Route::post('deletefiles/', 'FileSearchController@delete_files');

Route::get('file-upload', [FileUploadController::class, 'index'])->name('file-upload');
Route::post('store', [FileUploadController::class, 'store']);

