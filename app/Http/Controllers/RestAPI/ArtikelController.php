<?php

namespace App\Http\Controllers\RestAPI;

use Illuminate\Http\Request;
use App\Models\artikel_berita;
use App\Http\Controllers\Controller;
use App\Http\Resources\AgendaResource;
use App\Models\artikel_edukasi;

use App\Http\Resources\EdukasiResource;
use App\Http\Resources\ArtikelBeritaResource;
use App\Models\artikel_agenda;

class ArtikelController extends Controller
{
    public function getArtikelAll()
    {
        $count_berita = artikel_berita::count();
        $count_edukasi = artikel_edukasi::count();
        $count_agenda = artikel_agenda::count();
        $skip = 3;
        $limit_ber = $count_berita - $skip;
        $limit_edu = $count_edukasi - $skip;
        $limit_age = $count_agenda - $skip;

        if ($count_agenda <= $skip) {
            //  $data = artikel_berita::orderBy('id_berita','DESC')->skip($skip)->take($limit_ber)->get();
            // $data2 = artikel_edukasi::orderBy('id_edukasi','DESC')->skip($skip)->take($limit_edu)->get();
            $data3 = artikel_agenda::orderBy('id_agenda', 'DESC')->get();
        } else {
            $data3 = artikel_agenda::orderBy('id_agenda', 'DESC')->skip($skip)->take($limit_age)->get();
        }

        if ($count_berita <= $skip) {
            $data = artikel_berita::orderBy('id_berita', 'DESC')->get();
            //  $data2 = artikel_edukasi::orderBy('id_edukasi','DESC')->skip($skip)->take($limit_edu)->get();/
            //   $data3 = artikel_agenda::orderBy('id_agenda','DESC')->skip($skip)->take($limit_age)->get();

        } else {
            $data = artikel_berita::orderBy('id_berita', 'DESC')->skip($skip)->take($limit_ber)->get();
        }

        if ($count_edukasi <= $skip) {
            // $data = artikel_berita::orderBy('id_berita','DESC')->skip($skip)->take($limit_ber)->get();
            $data2 = artikel_edukasi::orderBy('id_edukasi', 'DESC')->get();
            //  $data3 = artikel_agenda::orderBy('id_agenda','DESC')->skip($skip)->take($limit_age)->get();
        } else {
            $data2 = artikel_edukasi::orderBy('id_edukasi', 'DESC')->skip($skip)->take($limit_edu)->get();
        }


        $dataColt = ArtikelBeritaResource::collection($data);
        $dataColt2 = EdukasiResource::collection($data2);
        $dataColt3 = AgendaResource::collection($data3);
        $all = $dataColt->merge($dataColt2)->merge($dataColt3);
        // $mix = $all->shuffle();
        // $sorting = $mix->sortByDesc();

        return json_encode($all);
    }



    public function getAllArtikelHigh()
    {
        $data = artikel_berita::orderBy('id_berita', 'DESC')->take(3)->get();
        $data2 = artikel_edukasi::orderBy('id_edukasi', 'DESC')->take(3)->get();
        $data3 = artikel_agenda::orderBy('id_agenda', 'DESC')->take(3)->get();
        $dataColt = ArtikelBeritaResource::collection($data);
        $dataColt2 = EdukasiResource::collection($data2);
        $dataColt3 = AgendaResource::collection($data3);
        $all = $dataColt->merge($dataColt2)->merge($dataColt3);
        // $mix = $all->shuffle();
        // $sorting = $mix->sortByDesc();

        return json_encode($all);
    }

    public function newArtikelEdukasi()
    {
        $count = artikel_edukasi::count();
        $skip = 0;
        $limit = $count - $skip;
        $data = artikel_edukasi::orderBy('id_edukasi', 'DESC')->skip($skip)->take($limit)->get();
        $data_edu = EdukasiResource::collection($data);

        return json_encode($data_edu);
    }

    public function newArtikelAgenda()
    {
        $count = artikel_agenda::count();
        $skip = 0;
        $limit = $count - $skip;
        $data = artikel_agenda::orderBy('id_agenda', 'DESC')->skip($skip)->take($limit)->get();
        $data_edu = AgendaResource::collection($data);

        return json_encode($data_edu);
    }

    public function detailEdukasi(Request $request)
    {
        $data = artikel_edukasi::where('id_edukasi', $request->idEdukasi)->get();
        $dataRes = EdukasiResource::collection($data);

        return json_encode($dataRes);
    }

    public function detailAgenda(Request $request)
    {
        $data = artikel_agenda::where('id_agenda', $request->idAgenda)->get();
        $dataRes = AgendaResource::collection($data);

        return json_encode($dataRes);
    }
}
