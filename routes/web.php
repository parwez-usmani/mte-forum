<?php
use Illuminate\Support\Facades\Route;
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
Route::group(['middleware'=>['web']],function(){
    Route::view('login','livewire.home')->name('login');

    // Route::view('roles/create', 'livewire.roles.create')->name('roles.create');
});
// Route::view('login','livewire.home')->name('login');
Route::view('dashboard', 'livewire.dashboard')->name('dashboard.index');

// users
Route::view('user', 'livewire.users.index')->name('users.index');

// permissions
Route::view('permission', 'livewire.permissions.index')->name('permissions.index');

// roles
Route::view('role', 'livewire.roles.index')->name('roles.index');
// Route::view('roles/create', 'livewire.roles.create')->name('roles.create');

// category
Route::view('category', 'livewire.categories.index')->name('categories.index');

// topic
Route::view('topic', 'livewire.topics.index')->name('topics.index');

// comment
Route::view('comment', 'livewire.comments')->name('comments.index');

// Access Denied route
Route::view('accessdenied','livewire.accessdenied')->name('accessdenied');

// // role auth url restriction
// Route::group(['middleware'=>['auth','role:superadmin']],function(){
//     Route::view('role', 'livewire.roles.index')->name('roles.index');
//     Route::view('role/update', 'livewire.roles.update')->name('role.update');
// });

// permission auth url restriction
Route::group(['middleware'=>['auth','permission:superadmin']],function(){ 
    Route::view('roles/create', 'livewire.roles.create')->name('roles.create'); 
});