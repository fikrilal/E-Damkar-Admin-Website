<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingedukasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table('artikel_edukasis')
            ->orderByDesc('id_edukasi');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_edukasi', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $artikel = $query->get();
        $title = 'Edukasi | E-Damkar Nganjuk';

        return view('landinginformasi.landingedukasi', compact('artikel', 'search', 'title'));
    }
}
