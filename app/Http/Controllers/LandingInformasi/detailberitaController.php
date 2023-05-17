<?php

namespace App\Http\Controllers\LandingInformasi;

use App\Models\artikel_berita;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class detailberitaController extends Controller
{
    public function index(){
 
        return view('landinginformasi.detailberita');
        
    }
}
