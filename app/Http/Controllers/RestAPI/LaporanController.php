<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\pelaporanResources;
use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function AddPelaporan(Request $request)
    {

        $validateData = $request->validate([
            'user_listdata_id' => 'required',
            'status_riwayat_id' => 'required',
            'kategori_laporan_id' => 'required',
            'tgl_lap' => 'required',
            'deskripsi_laporan' => 'required',
            'gambar_bukti_pelaporan' => 'image',
            'alamat_kejadian' => 'required'
        ]);

        if ($request->file('gambar_bukti_pelaporan')) {
            $validateData['gambar_bukti_pelaporan'] = $request->file('gambar_bukti_pelaporan')->store('gambar_pelaporans');
        }

        if (laporan::create($validateData)) {
            return json_encode(['message' => "berhasil melakukan pelaporan"]);
        } else {
            return json_encode(['message' => "gagal melakukan pelaporan"]);
        }
    }

    public function getDataPelaporan(Request $request)
    {
        $data = laporan::where('user_listdata_id', $request->userId)->get();
        return pelaporanResources::collection($data);
    }

    
}
