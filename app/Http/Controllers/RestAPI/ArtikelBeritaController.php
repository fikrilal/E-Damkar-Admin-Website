<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelBeritaResource;
use App\Models\artikel_berita;
use Illuminate\Http\Request;

class ArtikelBeritaController extends Controller
{
    public function getArtikelBerita()
    {
        $data = artikel_berita::all();
        return ArtikelBeritaResource::collection($data);
    }

    public function newArtikelBerita(){
        $data = artikel_berita::all()->take(5);
        return json_encode($data);
    }

}
