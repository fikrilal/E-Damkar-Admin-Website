<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingberitaController extends Controller
{
    public function index(){
        $artikel = DB::table('artikel_beritas')
        ->orderByDesc('id_berita')
        ->get();

        return view('landinginformasi.landingberita', compact('artikel'));
        
    }

}
