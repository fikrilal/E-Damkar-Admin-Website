<?php

namespace App\Http\Controllers\LandingInformasi;

use App\Models\artikel_edukasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class detailedukasiController extends Controller
{
    public function index()
    {
        return redirect('landingedukasi');
    }

    public function show($id_edukasi)
    {
        $edukasi = DB::table('artikel_edukasis')->where('id_edukasi', $id_edukasi)->first();
        
        if ($edukasi) {
            $artikel1 = DB::table('artikel_edukasis')
                ->orderByDesc('id_edukasi')
                ->take(4)
                ->get();
                
            return view('landinginformasi.detailedukasi', compact('edukasi', 'artikel1'));
        } else {
            return redirect()->back()->with('error', 'Edukasi tidak ditemukan.');
        }
    }
}
