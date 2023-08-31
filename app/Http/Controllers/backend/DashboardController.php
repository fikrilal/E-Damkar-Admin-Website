<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $title = 'Dashboard | E-Damkar Nganjuk';
        return view('backend.dashboard', ['title' => $title]);        
    }
    
    public function getLaporanMasuk()
    {
        $now = now();
        $laporanMasukRealtime = DB::table('laporans')
            ->join('detail_laporan_penggunas', 'id', '=', 'laporans.detail_laporan_pengguna_id')
            ->whereIn('status_riwayat_id', [1])
            ->whereDate('detail_laporan_penggunas.tgl_pelaporan', $now->toDateString())
            ->latest() // Mengambil data terakhir berdasarkan created_at atau kolom lain yang sesuai
            ->first();
    
        return response()->json(['count' => $laporanMasukRealtime ? 1 : 0]); // Mengembalikan 1 jika ada data, 0 jika tidak ada
    }
    

    public function getLaporanKategori()
    { 
        $now = now();
        $laporanMasukRealtimeKategori = DB::table('laporans')
            ->join('detail_laporan_penggunas', 'id', '=', 'laporans.detail_laporan_pengguna_id')
            ->whereIn('status_riwayat_id', [1])
            ->whereDate('detail_laporan_penggunas.tgl_pelaporan', $now->toDateString())
            ->select('laporans.kategori_laporan_id') // Hanya ambil kolom kategori_laporan_id
            ->first();
    
        $kategori = $laporanMasukRealtimeKategori ? $laporanMasukRealtimeKategori->kategori_laporan_id : '';
    
        return response()->json(['kategori' => $kategori]); 
    }


}
