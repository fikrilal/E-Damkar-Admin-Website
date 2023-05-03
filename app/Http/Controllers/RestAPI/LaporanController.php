<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function AddPelaporan(Request $requeest)
    {

        $validateData = $requeest->validate([
            'user_listdata_id' => 'required',
            'status_riwayat_id' => 'required',
            'kategori_laporan_id' => 'required',
            'tgl_lap' => 'required',
            'deskripsi_laporan' => 'required',
            'gambar_bukti_pelaporan' => 'image',
            'alamat_kejadian' => 'required'
        ]);

        if ($requeest->file('gambar_bukti_pelaporan')) {
            $validateData['gambar_bukti_pelaporan'] = $requeest->file('gambar_bukti_pelaporan')->store('gambar_pelaporans');
        }

        laporan::create($validateData);

        return $requeest->user_listdata_id;
    }

    public function ShowPelaporan(){
        
    }
}



