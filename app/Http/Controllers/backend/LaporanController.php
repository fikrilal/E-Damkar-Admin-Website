<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan;

class LaporanController extends Controller
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
    
    
    public function index() {
        $title = 'Laporan Selesai | E-Damkar Nganjuk';
        $data = laporan::whereIn('status_riwayat_id', [4,5])
        ->orderBy('idLaporan', 'desc')
        ->get();
return view('backend.laporan', compact('data','title'));
    }

}
