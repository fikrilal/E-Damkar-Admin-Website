<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\pelaporanResources;
use App\Models\detail_laporan_pengguna;
use App\Models\laporan;
use App\Models\user_listData;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //tamabah pelaporan
    public function AddPelaporan(Request $request)
    {
        $vData = $request->validate([
            'kategori_laporan_id' => 'required|integer',
            'user_listdata_id' => 'required|integer',
            'deskripsi_laporan' => 'required|string',
            'nama_hewan' => 'string',
            'waktu_pelaporan' => 'required|string',
            'tgl_pelaporan' => 'required|string',
            'urgensi' => 'required|string',
            'alamat' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
            'bukti_foto_laporan_pengguna' => 'required|string'
        ]);

        $kategoriLap = $vData['kategori_laporan_id'];
        unset($vData['kategori_laporan_id']);
        $execDtl = detail_laporan_pengguna::create($vData)->id;

        $crt_lap = [
            'status_riwayat_id' => 1,
            'kategori_laporan_id' => $kategoriLap,
            'detail_laporan_pengguna_id' => $execDtl
        ];


        if (laporan::create($crt_lap)) {
            return json_encode(["condition" => true, 'message' => "berhasil melakukan pelaporan"]);
        } else {
            return json_encode(["condition" => false, 'message' => "gagal melakukan pelaporan"]);
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
        // $data = laporan::where('user_listdata_id', $request->userId)->get();

        $data = detail_laporan_pengguna::where('user_listdata_id', $request->userId)->get();
        
        return pelaporanResources::collection($data);
    }
    public function getDetailPelaporan(Request $request)
    {
        $data = laporan::where('idLaporan', $request->idLaporan)->get();
        return pelaporanResources::collection($data->laporan);
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
        $target = "085708574368";

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
