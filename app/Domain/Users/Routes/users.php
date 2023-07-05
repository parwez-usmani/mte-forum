<?php
Route::group(['middleware'=>['web']],function(){
    Route::view('/','livewire.home')->name('login');

    Route::view('user', 'users::index')->name('users.index');
});
