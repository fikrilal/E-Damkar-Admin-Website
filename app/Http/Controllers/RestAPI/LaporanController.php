<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\LaporanPetugasResources;
use App\Http\Resources\pelaporanDetailResource;
use App\Http\Resources\pelaporanResources;
use App\Models\detail_laporan_pengguna;
use App\Models\detail_laporan_petugas;
use App\Models\kondisi_cuaca;
use App\Models\laporan;
use App\Models\user_listData;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

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


    //mengubah laporan menjadi tangani
    public function AddTanganiPetugas(Request $request)
    {
        $aData = $request->validate([
            'damkar_id' => 'required|integer',
            'idLaporan' => 'required',
            'waktu_penanganan' => 'required|string',
            'tgl_laporan_petugas' => 'required|string'
        ]);
        $aData['deskripsi_petugas'] = '';
        $aData['waktu_berangkat'] = '';
        $aData['waktu_sampai'] = '';
        $aData['waktu_selesai'] = '';
        $aData['korban_jiwa'] = 0;
        $aData['korban_luka_ringan'] = 0;
        $aData['korban_luka_berat'] = 0;
        $aData['kerugian'] = '';
        $aData['luas_lahan'] = '';
        $aData['tindakan'] = '';
        $aData['pihak_yang_datang'] = '';
        $aData['jenis_evakuasi'] = '';
        $aData['team_evakuasi'] = '';
        $aData['bukti_foto_laporan_petugas'] = '';

        $execDtl = detail_laporan_petugas::create($aData)->id;
        $crt_lap = [
            'status_riwayat_id' => 3,
            'detail_laporan_petugas_id' => $execDtl
        ];

        if (DB::table('laporans')->where('idLaporan', '=', $request->idLaporan)->update($crt_lap)) {
            return json_encode(
                [
                    "condition" => true,
                    'message' => "berhasil menangani laporan",
                    'kode' => '200'
                ]
            );
        } else {
            return json_encode(
                [
                    "condition" => false,
                    'message' => "gagal melakukan pelaporan",

                ]
            );
        }
    }

    //get data detail lap petugas
    public function getDetailLapPetugas(Request $request)
    {
        $dataLap = detail_laporan_petugas::where('id', $request->id)->get();


        $data = detail_laporan_pengguna::where('user_listdata_id', $request->userId)->get();
        return pelaporanResources::collection($data);
    }



    public function AddPelaporanPetugas2(Request $request)
    {
        $vData = $request->validate([
            // 'id' => 'required',
            'idLaporan' => 'required',
            'detail_laporan_petugas_id' => 'required',
            // 'damkar_id' => 'required|integer',
            // 'waktu_penanganan' => 'required|string',

            // 'tgl_laporan_petugas' => 'required|string',
            'deskripsi_petugas' => 'required|string',
            'korban_jiwa' => 'required|integer',
            'korban_luka_ringan' => 'required|integer',
            'korban_luka_berat' => 'required|integer',
            'kerugian' => 'required|integer',
            'luas_lahan' => 'required|integer',
            'tindakan' => 'required|string',
            'pihak_yang_datang' => 'required|string',
            'jenis_evakuasi' => 'required|string',
            'team_evakuasi' => 'required|string',
            'bukti_foto_laporan_petugas' => 'required|string',
            'kondisi_cuaca_id' => 'required|integer'


        ]);

        $idCuaca = $vData['kondisi_cuaca_id'];
        // $execDtl = detail_laporan_petugas::create($vData)->id;


        $crt_lap = [
            'status_riwayat_id' => 4,
            'detail_korban_id' => 1,
            'kondisi_cuaca_id' => $idCuaca,
            // 'detail_laporan_petugas_id' => $execDtl
        ];

        $UpdateLaporan = DB::table('laporans')->where('idLaporan', '=', $request->idLaporan)->update($crt_lap);
        // $UpdateDetailPetugas = DB::table('detail_laporan_petugas')->where('id', '=', $request->idLaporan)->update($vData);
        $UpdateDetailPetugas = DB::table('detail_laporan_petugas')->join('laporans', 'laporans.detail_laporan_petugas_id', '=', 'detail_laporan_petugas.id')->where('laporans.detail_laporan_petugas_id', '=', $request->detail_laporan_petugas_id)->update($vData);



        if ($UpdateLaporan & $UpdateDetailPetugas) {
            return json_encode(
                [
                    "condition" => true,
                    'message' => "berhasil melakukan pelaporan",
                    'kode' => '200'
                ]
            );
        } else {
            return json_encode(
                [
                    "condition" => false,
                    'message' => "gagal melakukan pelaporan",

                ]
            );
        }
    }


    //tanpa ditangani
    public function AddPelaporanPetugas(Request $request)
    {
        $vData = $request->validate([

            'idLaporan' => 'required',

            'damkar_id' => 'required|integer',
            'waktu_penanganan' => 'required|string',

            'tgl_laporan_petugas' => 'required|string',
            'deskripsi_petugas' => 'required|string',
            'korban_jiwa' => 'required|integer',
            'korban_luka_ringan' => 'required|integer',
            'korban_luka_berat' => 'required|integer',
            'kerugian' => 'required|string',
            'luas_lahan' => 'required|string',
            'tindakan' => 'required|string',
            'pihak_yang_datang' => 'required|string',
            'jenis_evakuasi' => 'required|string',
            'team_evakuasi' => 'required|string',
            'bukti_foto_laporan_petugas' => 'required|string',
            'kondisi_cuaca_id' => 'required|integer'


        ]);

        $idCuaca = $vData['kondisi_cuaca_id'];
        $execDtl = detail_laporan_petugas::create($vData)->id;


        $crt_lap = [
            'status_riwayat_id' => 4,
            'detail_korban_id' => 1,
            'kondisi_cuaca_id' => $idCuaca,
            'detail_laporan_petugas_id' => $execDtl
        ];

        $UpdateLaporan = DB::table('laporans')->where('idLaporan', '=', $request->idLaporan)->update($crt_lap);
        // $UpdateDetailPetugas = DB::table('detail_laporan_petugas')->where('id', '=', $request->idLaporan)->update($vData);
        // $UpdateDetailPetugas = DB::table('detail_laporan_petugas')->join('laporans', 'laporans.detail_laporan_petugas_id', '=','detail_laporan_petugas.id')->where('laporans.detail_laporan_petugas_id', '=', $request->detail_laporan_petugas_id)->update($vData);



        if ($UpdateLaporan) {
            return json_encode(
                [
                    "condition" => true,
                    'message' => "berhasil melakukan pelaporan",
                    'kode' => '200'
                ]
            );
        } else {
            return json_encode(
                [
                    "condition" => false,
                    'message' => "gagal melakukan pelaporan",

                ]
            );
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
            Storage::disk('public/gambar_pelaporans')->put($validateData['title'] . '.jpg', $request->file('image'));
        }

        return json_encode(['kondisi' => 'real', 'path' => $validateData['image'], 'title' => $validateData['title']]);
    }
    public function addImagePetugas(Request $request)
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
        $data = detail_laporan_pengguna::where('user_listdata_id', $request->userId)->get();
        return pelaporanResources::collection($data);
    }
    public function getDetailPelaporan(Request $request)
    {
        $data = Laporan::where('idLaporan', $request->idLaporan)->first();
        return new pelaporanDetailResource($data);
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


    public function getLaporanByIdUser($idUser, $statusId)
    {
        $toJson = [
            'kondisi' => true,
            'message' => 'data has been found',
            'data' => []
        ];
        $data = detail_laporan_pengguna::where('user_listdata_id', $idUser)->get();
        if ($data != null) {
            foreach ($data as $data) {
                if ($data->laporan->status_riwayat_id == $statusId) {
                    $detail["idLaporan"] = $data->laporan->idLaporan;
                    $detail["status_riwayat"] = $data->laporan->statusRiwayat->nama_status;
                    $detail['kategori_laporan'] = $data->laporan->kategoriLaporan->nama_kategori;
                    $detail['tanggal'] = $data->tgl_pelaporan;
                    $detail['deskripsi'] = $data->deskripsi_laporan;
                    $detail['image_url'] = $data->bukti_foto_laporan_pengguna;
                    $detail['alamat'] = $data->alamat;
                    $detail['urgensi'] = $data->urgensi;
                    array_push($toJson['data'], $detail);
                }
            }
            return $toJson;
        }
        $toJson['kondisi'] = false;
        $toJson['message'] = 'data not found';
        return $toJson;
    }
    public function filterLapMenunggu(Request $request)
    {
        return json_encode($this->getLaporanByIdUser($request->userId, 1));
    }
    public function filterLapProses(Request $request)
    {
        return json_encode($this->getLaporanByIdUser($request->userId, 2));
    }
    public function filterLapDitangani(Request $request)
    {
        return json_encode($this->getLaporanByIdUser($request->userId, 3));
    }
    public function filterLapSelesai(Request $request)
    {
        return json_encode($this->getLaporanByIdUser($request->userId, 4));
    }

    public function filterLapDitolak(Request $request)
    {
        return json_encode($this->getLaporanByIdUser($request->userId, 5));
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

    function updateStatusRwt(Request $request)
    {
        $data = Laporan::where('idLaporan', $request->idLaporan)->update(["status_riwayat_id" => 3]);
    }


    function getDataPelaporanRLT()
    {
        $data = laporan::Where('status_riwayat_id', 2)->get();
        $json = [
            "condition" => true,
            "command" => "dataLaporan",
            "payload" => LaporanPetugasResources::collection($data)
        ];

        return response()->json($json, 200);
    }
}
