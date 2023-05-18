<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = DB::table('pengaturan')->get();
        $data1 = DB::table('laporans')
            ->whereIn('status_riwayat_id', [3, 4])
            ->count();
    
        $artikel = DB::table('artikel_beritas')
            ->orderByDesc('id_berita')
            ->take(6)
            ->get();

        $title = 'E-Damkar Nganjuk';
    
        return view('welcome', compact('data', 'artikel', 'data1', 'title'));
    }
    
}
