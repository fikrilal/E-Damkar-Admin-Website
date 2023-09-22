<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;
use App\Models\laporan;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard | E-Damkar Nganjuk';
        return view('backend.dashboard', ['title' => $title]);
    }

    public function getLaporanMasuk()
    {
        // $now = now();
        // $laporanMasukRealtime = DB::table('laporans')
        //     ->join('detail_laporan_penggunas', 'id', '=', 'laporans.detail_laporan_pengguna_id')
        //     ->whereIn('status_riwayat_id', [1])
        //     ->whereDate('detail_laporan_penggunas.tgl_pelaporan', $now->toDateString())->get();
        // Mengambil data terakhir berdasarkan created_at atau kolom lain yang sesuai
        $laporanMasukRealtime = laporan::Where("status_riwayat_id", 1)->get();
        return response()->json(['count' => $laporanMasukRealtime->count()]); // Mengembalikan 1 jika ada data, 0 jika tidak ada
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
