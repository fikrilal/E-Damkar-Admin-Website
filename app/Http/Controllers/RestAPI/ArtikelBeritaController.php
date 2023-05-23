<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelBerita_2Resource;
use App\Http\Resources\ArtikelBeritaResource;
use App\Http\Resources\ArtikelEdukasiResource;
use App\Models\artikel_berita;
use App\Models\artikel_edukasi;
use Illuminate\Http\Request;
use Psr\Http\Message\RequestInterface;

class ArtikelBeritaController extends Controller
{
    public function getArtikelBerita()
    {
        $data = artikel_berita::all();
        return ArtikelBeritaResource::collection($data);
    }
    public function getArtikelBeritaHome()
    {
        $data = artikel_berita::take(3)->get();
        return ArtikelBeritaResource::collection($data);
    }

    public function newArtikelBerita(Request $request)
    {
        $count = artikel_berita::count();
        $skip = 0;
        $limit = $count - $skip;
        $data = artikel_berita::orderBy('id_berita', 'DESC')->skip($skip)->take($limit)->get();
        $dataBeritaRes = ArtikelBeritaResource::collection($data);

        return json_encode($dataBeritaRes);
    }

    public function getArtikelHighlight()
    {
        $data = artikel_berita::orderBy('id_berita', 'DESC')->take(5)->get();
        return ArtikelBeritaResource::collection($data);
    }
    public function detailBerita(Request $request)
    {
        $data = artikel_berita::where('id_berita', $request->idBerita)->get();
        $dataRes = ArtikelBeritaResource::collection($data);

        return json_encode($dataRes);
    }

    public function semuaArtikel()
    {

        $data = artikel_berita::orderBy('id_berita', 'DESC')->take(5)->get();
        $data2 = artikel_edukasi::orderBy('id_edukasi', 'DESC')->take(5)->get();
        $dataColt = ArtikelBerita_2Resource::collection($data);
        $dataColt2 = ArtikelEdukasiResource::collection($data2);
        $all = $dataColt->merge($dataColt2);
        // $mix = $all->shuffle();
        // $sorting = $all->sortByDesc('id')->values()->all();
        // $all = $all->toArray();
        return $all;
    }
}
