<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingberitaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table('artikel_beritas')
        ->orderByDesc('id_berita');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_berita', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi_berita', 'like', '%' . $search . '%');
            });
        }

        $artikel = $query->get();
        $title = 'Berita | E-Damkar Nganjuk';

        return view('landinginformasi.landingberita', compact('artikel', 'search', 'title'));
        
    }

}
