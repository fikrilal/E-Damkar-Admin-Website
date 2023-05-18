<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use \Carbon\Carbon;

class EdukasiController extends Controller
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
        $title = 'Edukasi | E-Damkar Nganjuk';
        $edukasi = DB::table('artikel_edukasis')
        ->orderBy('tgl_edukasi', 'desc')
        ->get();
        return view('backend.edukasi', compact('edukasi','title'));

    }

    public function create()
    {
        $berita = null;
        return view('backend.edukasi.create', compact('edukasi'));
    }

    private function uploadFile($fileName = '', $destinationPath = '')
    {
        $fileOriginalName = $fileName->getClientOriginalName();
        $timeStringFile = md5(time() . mt_rand(1, 10)) . $fileOriginalName;
        $fileName->move($destinationPath, $timeStringFile);
        return $timeStringFile;
    }
    
    
    public function edit(BeritaController $berita)
    {
        $berita = DB::table('artikel_edukasis')->where('id_edukasi', $edukasi->edukasi)->first();
        return view('backend.edukasi.create', compact('edukasi'));
    }
    
    public function update(Request $request, $id)
    {

        $request->validate([    
            'judul' => 'required|max:255',    
            'isi_artikel' => 'required',    
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], [    
            'judul.required' => 'Judul harus diisi.',   
             'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',    
             'isi_artikel.required' => 'Isi artikel harus diisi.',    
             'foto.image' => 'File yang diunggah harus berupa gambar.',    
             'foto.mimes' => 'File yang diunggah harus berformat JPEG, PNG, atau JPG.',    
             'foto.max' => 'Ukuran file tidak boleh lebih dari 2 MB.']);

        $destinationPath = public_path('img-edukasi');
             $fotoFile = '';
             $edukasi= DB::table('artikel_edukasis')->where('id_edukasi', $id)->first();

    $filename = $edukasi->foto_artikel_edukasi;

    if ($request->hasFile('foto')) {
        $destinationPath = public_path('img-edukasi');
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $filename);

        if (file_exists(public_path('img-edukasi/' . $edukasi->foto_artikel_edukasi))) {
            unlink(public_path('img-edukasi/' . $edukasi->foto_artikel_edukasi));
        }
    }

    DB::table('artikel_edukasis')->where('id_edukasi', $id)->update([
        'judul_edukasi' => $request->input('judul'),
        'foto_artikel_edukasi' => $filename,
        'deskripsi' => $request->input('isi_artikel'),
        'tgl_edukasi' => Carbon::now()
    ]);
        
        return redirect()->route('edukasi.index')->with('success', 'Artikel berhasil diperbarui!');
    }
    
    
    public function destroy($id)
    {
        $edukasi = DB::table('artikel_edukasis')->where('id_edukasi', $id)->first();
    
        if (!$edukasi) {
            return redirect()->route('edukasi.index')->with('error', 'Artikel tidak ditemukan!');
        }
    
        $fotoPath = public_path('img-edukasi') . '/' . $edukasi->foto_artikel_edukasi ;
    
        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
    
        DB::table('artikel_edukasis')->where('id_edukasi', $id)->delete();
    
        return redirect()->route('edukasi.index')->with('Berhasil', 'Artikel berhasil dihapus!');

    }

        public function store(Request $request)
        {

            $request->validate([    
                'judul' => 'required|max:255',    
                'isi_artikel' => 'required',    
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ], [    
                'judul.required' => 'Judul harus diisi.',   
                 'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',    
                 'isi_artikel.required' => 'Isi artikel harus diisi.',    
                 'foto.image' => 'File yang diunggah harus berupa gambar.',    
                 'foto.mimes' => 'File yang diunggah harus berformat JPEG, PNG, atau JPG.',    
                 'foto.max' => 'Ukuran file tidak boleh lebih dari 2 MB.']);

                 $destinationPath = public_path('img-edukasi');
                 $fotoFile = '';
             
                 if ($request->hasFile('foto')) {
                     $foto = $request->file('foto');
                     $filename = time() . '.' . $foto->getClientOriginalExtension();
                     $fotoFile = $foto->move($destinationPath, $filename);
                 }
             
                 DB::table('artikel_edukasis')->insert([
                     'admin_damkar_id' => $request->id,
                     'judul_edukasi' => $request->input('judul'),
                     'foto_artikel_edukasi' => $filename,
                     'deskripsi' => $request->input('isi_artikel'),
                     'tgl_edukasi' => Carbon::now()
                 ]);
            
                return redirect()->route('edukasi.index')
                                 ->with('success','Artikel Berhasil Ditambahkan!');
            }
}