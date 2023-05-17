<?php

namespace App\Http\Controllers\LandingInformasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class detailagendaController extends Controller
{
    public function index(){
        $artikel = DB::table('artikel_agendas')
        ->orderByDesc('id_agenda')
        ->get();

        return view('landinginformasi.detailagenda', compact('artikel'));
    }

    
}
