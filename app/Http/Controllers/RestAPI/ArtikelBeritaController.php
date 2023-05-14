<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelBeritaResource;
use App\Models\artikel_berita;
use Illuminate\Http\Request;
use Psr\Http\Message\RequestInterface;

class ArtikelBeritaController extends Controller
{
    public function getArtikelBerita()
    {
        $data = artikel_berita::all();
        return ArtikelBeritaResource::collection($data);
    }

    public function newArtikelBerita(Request $request)
    {
        $count = artikel_berita::count();
        $skip = 5;
        $limit = $count - $skip;
        $data = artikel_berita::orderBy('id_berita','DESC')->skip($skip)->take($limit)->get();
        return ArtikelBeritaResource::collection($data);
    }

    public function getArtikelHighlight(){
        $data = artikel_berita::orderBy('id_berita','DESC')->take(5)->get();
        return ArtikelBeritaResource::collection($data);
    }
    public function detailBerita(Request $request){
        $data = artikel_berita::where('id_berita', $request->idBerita)->get();
        return ArtikelBeritaResource::collection($data);
    }
   
}
