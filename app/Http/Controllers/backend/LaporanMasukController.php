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
        $title = 'Laporan Masuk | E-Damkar Nganjuk';
        $data = laporan::whereIn('status_riwayat_id', [1, 2, 3])
                    ->orderBy('idLaporan', 'desc')
                    ->get();
        return view('backend.laporanmasuk', compact('data','title'));
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
                $laporan->where('idLaporan', $request->id)->update(['status_riwayat_id' => 5]);
                return redirect()->back()->with('success', 'Status laporan berhasil ditolak');
                break;
            case 'selesai':
                $request->validate([
                    'bukti_penanganan' => 'image|max:2048|mimes:jpeg,png,jpg',
                ], [
                    'bukti_penanganan.required' => 'Gambar tidak boleh kosong / harus diisi.',
                    'bukti_penanganan.image' => 'File yang diunggah harus berupa gambar.',
                    'bukti_penanganan.mimes' => 'Gambar yang diunggah harus berformat JPEG, PNG, atau JPG.',
                    'bukti_penanganan.max' => 'Ukuran file tidak boleh lebih dari 2 MB.',
                ]);
                
                if ($request->hasFile('bukti_penanganan')) {
                    $fileName = $request->file('bukti_penanganan')->getClientOriginalName();
                    $request->file('bukti_penanganan')->storeAs('bukti_penanganan', $fileName);
                    $laporan->where('idLaporan', $request->id)->update(['status_riwayat_id' => 2, 'bukti_penanganan' => $fileName]);                
                } else {
                    $laporan->where('idLaporan', $request->id)->update(['status_riwayat_id' => 2]);
                }
                return redirect()->back()->with('success', 'Status laporan berhasil diproses');
                break;
            default:
                return redirect()->back()->with('error', 'Aksi tidak valid');
        }
        $laporan->save();
    }

}
