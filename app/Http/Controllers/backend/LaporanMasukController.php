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

    public function updateStatus(Request $request)
    {
        $laporan = laporan::where('idLaporan', $request->id)->first();
        $status = $request->input('status');
        switch ($status) {
            case 'proses':
                $laporan->where('idLaporan', $request->id)->update(['status_riwayat_id' => 2]);
                return redirect()->back()->with('success', 'Status laporan berhasil diproses');
                break;
            case 'tolak':
                $laporan->where('idLaporan', $request->id)->update(['status_riwayat_id' => 4]);
                return redirect()->back()->with('success', 'Status laporan berhasil ditolak');
                break;
            case 'selesai':
                $laporan->where('idLaporan', $request->id)->update(['status_riwayat_id' => 3]);
                return redirect()->back()->with('success', 'Status laporan berhasil diselesaikan');
                break;
            default:
                return redirect()->back()->with('error', 'Aksi tidak valid');
        }
        $laporan->save();
    }
    

   

}
