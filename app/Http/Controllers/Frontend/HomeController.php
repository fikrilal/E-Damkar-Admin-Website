<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request,
App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('frontend.home');
    }
}
