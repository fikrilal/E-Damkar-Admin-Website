<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


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
    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    $laporanMasuk = DB::table('laporans')
        ->whereIn('status_riwayat_id', [1, 2])
        ->whereBetween('tgl_lap', [$startOfWeek, $endOfWeek])
        ->get();

    $laporanSelesai = DB::table('laporans')
        ->whereIn('status_riwayat_id', [3, 4])
        ->get();

    $artikelBerita = DB::table('artikel_beritas')
        ->whereBetween('tgl_berita', [$startOfWeek, $endOfWeek])
        ->get();

    $dataMasuk = $laporanMasuk->count();
    $dataSelesai = $laporanSelesai->count();
    $totalBerita = $artikelBerita->count();

    $tanggalLaporanMasuk = $laporanMasuk->pluck('tgl_lap')->toArray();
    $tanggalLaporanSelesai = $laporanSelesai->pluck('tgl_lap')->toArray();
    $tanggalBerita = $artikelBerita->pluck('tgl_berita')->toArray();

    $title = 'Dashboard | E-Damkar Nganjuk';

    return view('dashboard', compact('dataMasuk', 'dataSelesai', 'totalBerita', 'title', 'tanggalLaporanMasuk', 'tanggalLaporanSelesai', 'tanggalBerita'));
}

}
