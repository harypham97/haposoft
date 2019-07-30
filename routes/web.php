<?php



Route::get('/', function () {

    return "hello world";

});

Route::resource('user', 'UserController');
