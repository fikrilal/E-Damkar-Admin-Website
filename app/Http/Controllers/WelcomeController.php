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
        $artikel = DB::table('artikel_beritas')
        ->orderByDesc('id_berita')
        ->take(6)
        ->get();

        return view('welcome', compact('data','artikel'));
    }
}
