<?php
Route::any('/', ['as' => 'home.home', 'uses' => 'HomeController@do_home']);
Route::any('/api/orderInfo/{sourceOrderNumber}', ['as' => 'api.order', 'uses' => 'APIController@do_orderInfo']);
