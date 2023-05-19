<?php

namespace App\Http\Controllers\RestAPI;

use Illuminate\Http\Request;
use App\Models\artikel_agenda;
use App\Models\artikel_berita;
use App\Models\artikel_edukasi;
use App\Http\Controllers\Controller;
use App\Http\Resources\EdukasiResource;
use App\Http\Resources\ArtikelBeritaResource;

class EdukasiController extends Controller
{
    public function getArtikelEdukasi(){

        $_dataBerita = artikel_berita::all(); 
        $_dataEdukasi = artikel_edukasi::all();

        $resourceEdukasi = EdukasiResource::collection($_dataEdukasi);
        $resourceBerita = ArtikelBeritaResource::collection($_dataBerita);

        return response()->json([
            'resource1' => $resourceBerita,
            'resource2' => $resourceEdukasi,
        ]);
        
    }

    public function getArtikelBerita()
    {
        $count_berita = artikel_berita::count();
        $count_edukasi = artikel_edukasi::count();
        $skip = 3;
        $limit_ber = $count_berita - $skip;
        $limit_edu = $count_edukasi - $skip;

        $data = artikel_berita::orderBy('id_berita','DESC')->skip($skip)->take($limit_ber)->get();
        $data2 = artikel_edukasi::orderBy('id_edukasi','DESC')->skip($skip)->take($limit_edu)->get();
        $dataColt = ArtikelBeritaResource::collection($data);
        $dataColt2 = EdukasiResource::collection($data2);
        $all = $dataColt->merge($dataColt2);
        // $mix = $all->shuffle();
        // $sorting = $mix->sortByDesc();

        return json_encode($all);
    }

    public function getAllArtikelHigh(){
        $data = artikel_berita::orderBy('id_berita','DESC')->take(3)->get();
        $data2 = artikel_edukasi::orderBy('id_edukasi','DESC')->take(3)->get();
        $dataColt = ArtikelBeritaResource::collection($data);
        $dataColt2 = EdukasiResource::collection($data2);
        $all = $dataColt->merge($dataColt2);
        // $mix = $all->shuffle();
        // $sorting = $mix->sortByDesc();

        return json_encode($all);
    }

    public function newArtikelEdukasi()
    {
        $count = artikel_edukasi::count();
        $skip = 5;
        $limit = $count - $skip;
        $data = artikel_edukasi::orderBy('id_edukasi','DESC')->skip($skip)->take($limit)->get();
        return EdukasiResource::collection($data);
    }
}
