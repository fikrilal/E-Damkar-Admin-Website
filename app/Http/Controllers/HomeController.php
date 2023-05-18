<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data1 = DB::table('laporans')
        ->whereIn('status_riwayat_id', [3, 4])
        ->count();
    
        $data2 = DB::table('laporans')
        ->whereIn('status_riwayat_id', [1, 2])
        ->count();

        $berita = DB::table('artikel_beritas')
        ->count();

        $title = 'Dashboard | E-Damkar Nganjuk';
        return view('dashboard', compact('data1', 'data2','berita', 'title'));
    }
}
