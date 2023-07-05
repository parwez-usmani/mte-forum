<?php

Route::group(['middleware'=>['web']],function(){
Route::view('role', 'roles::index')->name('roles.index');
    Route::view('permission', 'permissions::index')->name('permissions.index');
});
