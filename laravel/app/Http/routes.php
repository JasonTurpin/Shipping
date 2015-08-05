<?php
Route::any('/', ['as' => 'home.home', 'uses' => 'HomeController@do_home']);
