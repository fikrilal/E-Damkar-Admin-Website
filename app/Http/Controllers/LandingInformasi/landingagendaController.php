<?php

namespace App\Http\Controllers\LandingInformasi;

use App\Models\LandingAgenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingagendaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table('artikel_agendas')
            ->orderByDesc('id_agenda');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('judul_agenda', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $artikel = $query->get();
        $title = 'Agenda | E-Damkar Nganjuk';

        return view('landinginformasi.landingagenda', compact('artikel', 'search', 'title'));
    }
}
