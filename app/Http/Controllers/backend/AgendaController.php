<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use \Carbon\Carbon;

class AgendaController extends Controller
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
        $agenda = DB::table('artikel_agendas')->get();
        $title = 'Agenda | E-Damkar Nganjuk';
        return view('backend.agenda', compact('agenda','title'));

    }

    public function destroy($id)
    {
        $agenda = DB::table('artikel_agendas')->where('id_agenda', $id)->first();

    
        DB::table('artikel_agendas')->where('id_agenda', $id)->delete();
    
        return redirect()->route('agenda.index')->with('success', 'Artikel berhasil dihapus!');
    }
    
    

    public function store(Request $request)
    {

        $request->validate([
            'judul_agenda' => 'required|max:255',
            'tanggal' => 'required',
        ], [
            'judul_agenda.required' => 'Judul agenda wajib diisi',
            'judul_agenda.max' => 'Judul agenda maksimal :max karakter',
            'tanggal.required' => 'Tanggal agenda wajib diisi',
        ]);
    
        DB::table('artikel_agendas')->insert([
            'admin_damkar_id' => $request->id,
            'judul_agenda' => $request->input('judul_agenda'),
            'tgl_agenda' => $request->input('tanggal')
        ]);
    
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan!');
    }
    
    public function update(Request $request, $id)
{
    $request->validate([
        'judul_agenda' => 'required|max:255',
    ], [
        'judul_agenda.required' => 'Judul agenda wajib diisi',
        'judul_agenda.max' => 'Judul agenda maksimal :max karakter',
    ]);

    $agenda = DB::table('artikel_agendas')->where('id_agenda', $id)->first();

    // Cek apakah tanggal diisi atau tidak
    if ($request->filled('tanggal')) {
        $request->validate([
            'tanggal' => 'required',
        ], [
            'tanggal.required' => 'Tanggal agenda wajib diisi',
        ]);

        DB::table('artikel_agendas')->where('id_agenda', $id)->update([
            'tgl_agenda' => $request->input('tanggal')
        ]);
    }

    DB::table('artikel_agendas')->where('id_agenda', $id)->update([
        'judul_agenda' => $request->input('judul_agenda'),
    ]);

    return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diupdate!');
}



}