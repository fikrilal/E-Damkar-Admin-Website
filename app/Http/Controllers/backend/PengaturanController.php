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
        $title = 'Pengaturan | E-Damkar Nganjuk';
        $pengaturan = DB::table('pengaturan')->get();
        return view('backend.pengaturan', compact('pengaturan','title'));
    }

    public function update(Request $request, $pengaturan)
    {
        DB::table('pengaturan')
            ->where('id', $pengaturan)
            ->update([
                'jumlah_mobil' => $request->input('jumlah_mobil'),
                'jumlah_personil' => $request->input('jumlah_personil'),
                'jumlah_kantor' => $request->input('jumlah_kantor')
            ]);
    
        return redirect()->route('pengaturan.index')
                         ->with('success', 'Data berhasil diperbarui!');
                        }

}
