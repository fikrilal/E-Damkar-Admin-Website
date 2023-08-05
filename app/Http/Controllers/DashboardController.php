<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    
        $laporanMasuk = DB::table('laporans')
            ->join('detail_laporan_penggunas', 'id', '=', 'laporans.detail_laporan_pengguna_id')
            ->whereIn('status_riwayat_id', [1, 2])
            ->whereBetween('detail_laporan_penggunas.tgl_pelaporan', [$startOfWeek, $endOfWeek])
            ->get();
    
        $laporanSelesai = DB::table('laporans')
        ->join('detail_laporan_penggunas', 'id', '=', 'laporans.detail_laporan_pengguna_id')
        ->whereIn('status_riwayat_id', [4, 5])
        ->whereBetween('detail_laporan_penggunas.tgl_pelaporan', [$startOfWeek, $endOfWeek])
        ->get();
    
        $artikelBerita = DB::table('artikel_beritas')
            ->whereBetween('tgl_berita', [$startOfWeek, $endOfWeek])
            ->get();
    
        $dataMasuk = $laporanMasuk->count();
        $dataSelesai = $laporanSelesai->count();
        $totalBerita = $artikelBerita->count();
    
        $tanggalLaporanMasuk = $laporanMasuk->pluck('tgl_pelaporan')->toArray();
        $tanggalLaporanSelesai = $laporanSelesai->pluck('tgl_pelaporan')->toArray();
        $tanggalBerita = $artikelBerita->pluck('tgl_berita')->toArray();
    
        $title = 'Dashboard | E-Damkar Nganjuk';
    
        return view('dashboard', compact('dataMasuk', 'dataSelesai', 'totalBerita', 'title', 'tanggalLaporanMasuk', 'tanggalLaporanSelesai', 'tanggalBerita'));
    }
    
}
