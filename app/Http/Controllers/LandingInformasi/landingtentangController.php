<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingtentangController extends Controller
{
    public function index(){
        $title = 'Tentang Kami | E-Damkar Nganjuk';

        return view('landinginformasi.landingtentang', compact('title'));
        
    }
}
