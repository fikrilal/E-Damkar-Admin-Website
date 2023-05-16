<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingedukasiController extends Controller
{
    public function index(){
        $artikel = DB::table('artikel_edukasis')
        ->orderByDesc('id_edukasi')
        ->get();

        return view('landinginformasi.landingedukasi', compact('artikel'));
        
    }
}
