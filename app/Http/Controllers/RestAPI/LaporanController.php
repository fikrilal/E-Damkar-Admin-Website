<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\pelaporanResources;
use App\Models\laporan;
use App\Models\user_listData;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    //tamabah pelaporan
    public function AddPelaporan(Request $request)
    {
        $validateData = $request->validate([
            'user_listdata_id' => 'required',
            'status_riwayat_id' => 'required',
            'kategori_laporan_id' => 'required',
            'tgl_lap' => 'required',
            'deskripsi_laporan' => 'required',
            'gambar_bukti_pelaporan' => 'image',
            'alamat_kejadian' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
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

    //mendapatkan data pelaporan
    public function getDataPelaporan(Request $request)
    {
        $data = laporan::where('user_listdata_id', $request->userId)->get();
        return pelaporanResources::collection($data);
    }
    public function getDetailPelaporan(Request $request)
    {
        $data = laporan::where('idLaporan', $request->idLaporan)->get();
        return pelaporanResources::collection($data);
    }

    public function searchLapKategori(Request $request)
    {
        $data = laporan::where(
            'user_listdata_id', $request->userId)
            ->where(function($query) use ($request){
                $query->where('status_riwayat_id','like',"%".$request->text. "%");
                $query->orWhere('alamat_kejadian','like',"%".$request->text. "%");
                $query->orWhere('tgl_lap','like',"%".$request->text. "%");
                $query->orWhere('deskripsi_laporan','like',"%".$request->text. "%");

            })->get();
        return pelaporanResources::collection($data);
    }

    public function filterLapMenunggu(Request $request)
    {
        $data = laporan::where('user_listdata_id', $request->userId)
            ->where('status_riwayat_id', '1')->get();
        return pelaporanResources::collection($data);
    }
    public function filterLapProses(Request $request)
    {
        $data = laporan::where('user_listdata_id', $request->userId)
            ->where('status_riwayat_id', '2')->get();
        return pelaporanResources::collection($data);
    }
    public function filterLapSelesai(Request $request)
    {
        $data = laporan::where('user_listdata_id', $request->userId)
            ->where('status_riwayat_id', '3')->get();
        return pelaporanResources::collection($data);
    }
    public function filterLapDitolak(Request $request)
    {
        $data = laporan::where('user_listdata_id', $request->userId)
            ->where('status_riwayat_id', '4')->get();
        return pelaporanResources::collection($data);
    }
}
