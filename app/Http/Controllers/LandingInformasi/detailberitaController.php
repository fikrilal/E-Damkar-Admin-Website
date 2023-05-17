<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\artikel_berita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class detailberitaController extends Controller
{
    public function index(){
        return view('landinginformasi.detailberita');
        
    }

    public function show($id_berita)
{
    $berita = artikel_berita::find($id_berita);

    if ($berita) {
        return view('landinginformasi.detailberita', compact('berita'));
    } else {
        return redirect()->back()->with('error', 'Berita tidak ditemukan.');
    }
}

}
