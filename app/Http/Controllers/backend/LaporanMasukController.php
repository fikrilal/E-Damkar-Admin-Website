<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan;


class LaporanMasukController extends Controller
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
        $data = laporan::whereIn('status_riwayat_id', [1, 2])->get();
        return view('backend.laporanmasuk', compact('data'));
    }
    
}
