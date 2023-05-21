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

        $tanggalLaporan = DB::table('laporans')
            ->whereIn('status_riwayat_id', [1, 2, 3, 4])
            ->whereBetween('tgl_lap', [$startOfWeek, $endOfWeek])
            ->pluck('tgl_lap')
            ->toArray();

        $tanggalBerita = DB::table('artikel_beritas')
            ->whereBetween('tgl_berita', [$startOfWeek, $endOfWeek])
            ->pluck('tgl_berita')
            ->toArray();
            
            $dataMasuk = DB::table('laporans')
            ->whereIn('status_riwayat_id', [1, 2])
            ->whereBetween('tgl_lap', [$startOfWeek, $endOfWeek])
            ->count();
        
        $dataSelesai = DB::table('laporans')
            ->whereIn('status_riwayat_id', [3, 4])
            ->whereBetween('tgl_lap', [$startOfWeek, $endOfWeek])
            ->count();

        $totalBerita = DB::table('artikel_beritas')
            ->whereBetween('tgl_berita', [$startOfWeek, $endOfWeek])
            ->count();

        $title = 'Dashboard | E-Damkar Nganjuk';

        return view('dashboard', compact('dataMasuk', 'dataSelesai', 'totalBerita', 'title', 'tanggalLaporan', 'tanggalBerita'));
    }
}
