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
 
        return view('landinginformasi.landingberita');
        
    }

    public function show($id_berita)
    {
        $berita = DB::table('artikel_beritas')->where('id_berita', $id_berita)->first();

        if ($berita) {
            return view('landinginformasi.detailberita', compact('berita'));
        } else {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }
    }

}
