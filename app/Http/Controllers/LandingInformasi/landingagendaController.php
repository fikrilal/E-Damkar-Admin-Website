<?php

namespace App\Http\Controllers\LandingInformasi;

use App\Models\LandingAgenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingagendaController extends Controller
{
    public function index(){
        $artikel = DB::table('artikel_agendas')
        ->orderByDesc('id_agenda')
        ->get();

        return view('landinginformasi.landingagenda', compact('artikel'));
        
    }
}
