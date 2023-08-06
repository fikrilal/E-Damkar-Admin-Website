<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CetakLaporanController extends Controller
{
    public function index() {
        return view('backend.laporan');
    }


    public function show(Request $request)
    {
        $title = 'Cetak Laporan Kebakaran | E-Damkar Nganjuk';

        $tanggal = Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY'); // Format tanggal dalam bahasa Indonesia
    
        $idLaporan = $request->query('idLaporan');
    
        // Use Eloquent to retrieve the laporan object with related user_listdata
        $laporan = Laporan::where('idLaporan', $idLaporan)->first();
    
        if (!$laporan) {
            // Jika laporan dengan $idLaporan tidak ditemukan, berikan respons sesuai kebutuhan
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
    
        // Kemudian, kembalikan view yang menampilkan data laporan
        return view('backend.cetak-laporan', compact('laporan', 'tanggal','title'));
    }

    
}
