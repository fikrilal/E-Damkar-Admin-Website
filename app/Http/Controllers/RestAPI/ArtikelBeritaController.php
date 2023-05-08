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
        $data = artikel_berita::orderBy('id_berita', 'DESC')->skip($request->value)->take(5)->get();
        return ArtikelBeritaResource::collection($data);
    }
}
