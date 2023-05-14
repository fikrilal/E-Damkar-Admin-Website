<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingtentangController extends Controller
{
    public function index(){
        return view('TentangKami.hometentang');
        
    }
}
