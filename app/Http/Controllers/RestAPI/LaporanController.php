<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\pelaporanResources;
use App\Models\laporan;
use App\Models\user_listData;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //tamabah pelaporan
    public function AddPelaporan(Request $request)
    {
        $validateData = $request->validate([
            'user_listdata_id' => 'required',
            'kategori_laporan_id' => 'required',
            'tgl_lap' => 'required',
            'deskripsi_laporan' => 'required',
            'gambar_bukti_pelaporan' => 'required',
            'alamat_kejadian' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        $validateData['status_riwayat_id'] = 1;

        if (laporan::create($validateData)) {
            return json_encode(['message' => "berhasil melakukan pelaporan"]);
        } else {
            return json_encode(['message' => "gagal melakukan pelaporan"]);
        }
    }

    public function addImage(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'image' => 'image'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->storeAs('gambar_pelaporans', $validateData['title'] . '.jpg');
        }

        return json_encode(['kondisi' => 'real', 'path' => $validateData['image'], 'title' => $validateData['title']]);
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
            'user_listdata_id',
            $request->userId
        )
            ->where(function ($query) use ($request) {
                $query->where('status_riwayat_id', 'like', "%" . $request->text . "%");
                $query->orWhere('alamat_kejadian', 'like', "%" . $request->text . "%");
                $query->orWhere('tgl_lap', 'like', "%" . $request->text . "%");
                $query->orWhere('deskripsi_laporan', 'like', "%" . $request->text . "%");
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

    public function filterLapEmergency(Request $request)
    {
        $data = laporan::where('user_listdata_id', $request->userId)
            ->where('status_riwayat_id', '5')->get();
        return pelaporanResources::collection($data);
    }

    public function sendInfoToWhatsapp(Request $request)
    {
        $token = "B@!Q7v38HEvuvt5i6YSU";
        $target = "085862952781";

        $dataInformasi = $request->validate([
            'desa' => 'required',
            'jalan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'kodepos' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'namaBencana' => 'required',
            'noTelp' => 'required'
        ]);

        $pesan = "ini isi laporan";


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => "--------LAPORAN MASUK-------- \n*Urgensi:* " . $dataInformasi['namaBencana'] . "\n*No. WA:* " . $dataInformasi['noTelp'] .
                    "\n*Lokasi:* " . $dataInformasi['jalan'] . "," . $dataInformasi['desa'] . "," . $dataInformasi['kecamatan'] . "," .
                    $dataInformasi['kota'] . "," . $dataInformasi['kodepos'] . "," . "\n*Lokasi Maps:* https://www.google.com/maps/search/?api=1&query=" . $dataInformasi['latitude'] . "," . $dataInformasi['longitude'],

            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
