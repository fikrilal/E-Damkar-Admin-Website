<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $title = 'Dashboard | E-Damkar Nganjuk';
        return view('backend.dashboard', ['title' => $title]);        
    }

}
