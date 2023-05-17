<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchBeritaController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $artikel = DB::table('artikel_beritas')
            ->where('judul_berita', 'LIKE', "%$query%")
            ->orWhere('deskripsi_berita', 'LIKE', "%$query%")
            ->orderByDesc('id_berita')
            ->get();

        return view('landinginformasi.landingberita', compact('artikel'));
    }
}
