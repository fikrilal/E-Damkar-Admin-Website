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
        return redirect('landingberita');
    }

    public function show($id_berita)
    {
        $berita = DB::table('artikel_beritas')->where('id_berita', $id_berita)->first();

        if ($berita) {
            $artikel1 = DB::table('artikel_beritas')
            ->orderByDesc('id_berita')
            ->take(4)
            ->get();

            return view('landinginformasi.detailberita', compact('berita', 'artikel1'));
        } else {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }
    }

}
