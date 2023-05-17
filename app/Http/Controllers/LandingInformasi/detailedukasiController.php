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
        $data = DB::table('artikel_edukasis')->get();

        return view('landinginformasi.detailedukasi', compact('data'));
    }

    public function show($id_edukasi)
    {
        $edukasi = DB::table('artikel_edukasis')->where('id_edukasi', $id_edukasi)->first();

        if ($edukasi) {
            return view('landinginformasi.detailedukasi', compact('edukasi'));
        } else {
            return redirect()->back()->with('error', 'Edukasi tidak ditemukan.');
        }
    }
}
