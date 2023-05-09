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
        return view('backend.agenda', compact('agenda'));

    }

    public function destroy($id)
    {
        $agenda = DB::table('artikel_agendas')->where('id_agenda', $id)->first();
    
        if (!$agenda) {
            return redirect()->route('agenda.index')->with('error', 'Artikel tidak ditemukan!');
        }
    
        $fotoPath = public_path('img-agenda') . '/' . $agenda->foto_artikel_agenda;
    
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
    
        DB::table('artikel_agendas')->where('id_agenda', $id)->delete();
    
        return redirect()->route('agenda.index')->with('success', 'Artikel berhasil dihapus!');
    }
    
    

    public function store(Request $request)
    {
        $request->validate([
            'judul_agenda' => 'required|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_agenda' => 'required',
        ], [
            'judul_agenda.required' => 'Judul agenda wajib diisi',
            'judul_agenda.max' => 'Judul agenda maksimal :max karakter',
            'foto.required' => 'Foto agenda wajib diunggah',
            'foto.image' => 'File yang diunggah harus berupa gambar',
            'foto.mimes' => 'Format file yang diunggah harus jpeg, png, jpg, gif, atau svg',
            'foto.max' => 'Ukuran file foto maksimal :max KB',
            'deskripsi_agenda.required' => 'Deskripsi agenda wajib diisi',
        ]);
    
        $destinationPath = public_path('img-agenda');
        $fotoFile = '';
    
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $fotoFile = $foto->move($destinationPath, $filename);
        }
    
        DB::table('artikel_agendas')->insert([
            'admin_damkar_id' => $request->id,
            'judul_agenda' => $request->input('judul_agenda'),
            'foto_artikel_agenda' => $filename,
            'deskripsi' => $request->input('deskripsi_agenda'),
            'tgl_agenda' => Carbon::now()
        ]);
    
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan!');
    }
    
    public function update(Request $request, $id)
{
    $request->validate([
        'judul_agenda' => 'required|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'deskripsi_agenda' => 'required',
    ]);

    $agenda = DB::table('artikel_agendas')->where('id_agenda', $id)->first();

    $filename = $agenda->foto_artikel_agenda;

    if ($request->hasFile('foto')) {
        $destinationPath = public_path('img-agenda');
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $filename);

        if (file_exists(public_path('img-agenda/' . $agenda->foto_artikel_agenda))) {
            unlink(public_path('img-agenda/' . $agenda->foto_artikel_agenda));
        }
    }

    DB::table('artikel_agendas')->where('id_agenda', $id)->update([
        'judul_agenda' => $request->input('judul_agenda'),
        'foto_artikel_agenda' => $filename,
        'deskripsi' => $request->input('deskripsi_agenda'),
        'tgl_agenda' => Carbon::now()
    ]);

    return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diupdate!');
}

    


}