<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaturanController extends Controller
{
          /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index() {
        $pengaturan = DB::table('pengaturan')->get();
        return view('backend.pengaturan', compact('pengaturan'));
    }

    public function update(Request $request)
    {

       DB::table('pengaturan')->update([
        'jumlah_mobil' => $request->jumlah_mobil,
        'jumlah_personil' => $request->jumlah_personil,
        'jumlah_kantor' => $request->jumlah_kantor
       ]);

    
        return redirect()->route('pengaturan.index')
                         ->with('success', 'Artikel Berhasil diperbarui!');
            
    }

}
