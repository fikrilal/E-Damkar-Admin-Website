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
        $tanggal = Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY'); // Format tanggal dalam bahasa Indonesia
    
        $idLaporan = $request->query('idLaporan');
    
        // Use Eloquent to retrieve the laporan object with related user_listdata
        $laporan = laporan::with('user_listdata')->where('idLaporan', $idLaporan)->first();
    
        if (!$laporan) {
            // Jika laporan dengan $idLaporan tidak ditemukan, berikan respons sesuai kebutuhan
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
    
        // Check if the related user_listdata exists before accessing its properties
        $namalengkap = $laporan->user_listdata ? $laporan->user_listdata->namaLengkap : null;
        $nomorhp = $laporan->user_listdata ? $laporan->user_listdata->noHp : null;
    
        // Kemudian, kembalikan view yang menampilkan data laporan
        return view('backend.cetak-laporan', compact('laporan', 'tanggal', 'namalengkap', 'nomorhp'));
    }
    
}
