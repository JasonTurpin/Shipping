<?php
namespace App\Http\Controllers;
use View;

class HomeController extends Controller {
    // Home Screen
    public function do_home() {
        return View::make('Home.Home');
    }
}
