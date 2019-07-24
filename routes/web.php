<?php



Route::get('/', function () {

    return "fuck yaaa";

});

Route::resource('user', 'UserController');
