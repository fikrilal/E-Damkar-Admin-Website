<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $now = Carbon::now();
    
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

        $laporanMasukRealtime = DB::table('laporans')
        ->join('detail_laporan_penggunas', 'id', '=', 'laporans.detail_laporan_pengguna_id')
        ->whereIn('status_riwayat_id', [1])
        ->whereDate('detail_laporan_penggunas.tgl_pelaporan', $now->toDateString()) // Filter berdasarkan tanggal hari ini
        ->get(); // Mengambil satu baris data pertama

        $dataMasuknotif = $laporanMasukRealtime->count();
    
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
    
        return view('dashboard', compact('dataMasuk', 'dataSelesai', 'totalBerita', 'title', 'tanggalLaporanMasuk', 'tanggalLaporanSelesai', 'tanggalBerita', 'laporanMasukRealtime', 'dataMasuknotif'));
    }

    
    public function getLaporanMasuk()
    {
        $now = now();
        $laporanMasukRealtime = DB::table('laporans')
            ->join('detail_laporan_penggunas', 'id', '=', 'laporans.detail_laporan_pengguna_id')
            ->whereIn('status_riwayat_id', [1])
            ->whereDate('detail_laporan_penggunas.tgl_pelaporan', $now->toDateString())->get();
             // Mengambil data terakhir berdasarkan created_at atau kolom lain yang sesuai
            
        return response()->json(['count' => $laporanMasukRealtime -> count()  ]); // Mengembalikan 1 jika ada data, 0 jika tidak ada
    }
    
    

    public function getLaporanKategori()
    {
        $laporanMasukRealtimeKategori = DB::table('laporans')
            ->whereIn('status_riwayat_id', [1])
            ->select('kategori_laporan_id') // Hanya ambil kolom kategori_laporan_id
            ->orderBy('idLaporan', 'desc') // Urutkan berdasarkan idLaporan secara descending
            ->first();
    
        $kategori = $laporanMasukRealtimeKategori ? $laporanMasukRealtimeKategori->kategori_laporan_id : '';
    
        return response()->json(['kategori' => $kategori]);
    }
    
    

}
