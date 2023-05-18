<?php

namespace App\Http\Controllers\LandingInformasi;

use App\Models\artikel_agenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class detailagendaController extends Controller
{
    public function index(){
        return redirect('/landingagenda');
    }

    public function show($id_agenda)
    {
        $agenda = DB::table('artikel_agendas')->where('id_agenda', $id_agenda)->first();
    
        if ($agenda) {
            $artikel1 = DB::table('artikel_agendas')
                ->orderByDesc('id_agenda')
                ->take(4)
                ->get();
    
            $title = $agenda->judul_agenda; // Mengambil judul_agenda sebagai nilai $title
    
            return view('landinginformasi.detailagenda', compact('agenda', 'artikel1', 'title'));
        } else {
            return redirect()->back()->with('error', 'Agenda tidak ditemukan.');
        }
    }
    

}
