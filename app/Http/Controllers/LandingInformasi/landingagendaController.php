<?php

namespace App\Http\Controllers\LandingInformasi;

use App\Models\LandingAgenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class landingagendaController extends Controller
{
    public function index(){
        // $data = artikel_agenda::all();
        return view('landinginformasi.landingagenda');
        
    }
}
