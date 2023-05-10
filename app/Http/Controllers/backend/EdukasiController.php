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
        $edukasi = DB::table('artikel_edukasis')->get();
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
        $destinationPath = public_path().'/img-edukasi';
        $fotoFile = '';
            
        if ($request->hasFile('foto')) {
            $fotoFile = $this->uploadFile($request->file('foto'), $destinationPath);
        }
            
        $dataToUpdate = [
            'judul_edukasi' => $request->input('judul'),
            'deskripsi' => $request->input('isi_artikel'),
            'tgl_edukasi' => Carbon::now()
        ];
            
        if ($fotoFile !== '') {
            $dataToUpdate['foto'] = $fotoFile;
        }
            
        DB::table('artikel_edukasis')->where('id_edukasi', $id)->update($dataToUpdate);
        
        return redirect()->route('edukasi.index')->with('success', 'Artikel berhasil diperbarui!');
    }
    
    
    public function destroy($id)
    {
        

        DB::table('artikel_edukasis')->where('id_edukasi',$id)->delete();
        return redirect()->route('edukasi.index')
                         ->with('success', 'Artikel Berhasil dihapus!');



    }

    // public function store(Request $request)
    // {
        
    //     $destinationPath    = public_path().'\img-berita';

    //     $fotoFile='';

    //     if ($request->hasFile('foto'))
    //     {
    //         $fotoFile = $this->uploadFile($request->foto,$destinationPath);
    //     }
        
    //     DB::table('artikel_beritas')->insert([
    //         'admin_damkar_id' => '1',
    //         'kategori_artikel_id' => '2',
    //         'foto_berita_id' => $request->foto,
    //         'judul_berita' => $request->judul,
    //         'dekspripsi_berita' => $request->isi_artikel,
    //         'tgl_berita' => Carbon::now()
    //     ]);

    //     return redirect()->route('berita.index')
    //                     ->with('success','Artikel Berhasil Ditambahkan!');

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

                 
            $destinationPath = public_path().'/img-edukasi/';
            $fotoBeritaIds = array();
        
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $foto) {
                    $fotoName = uniqid().'.'.$foto->getClientOriginalExtension();
                    $foto->move($destinationPath, $fotoName);
        
                    $fotoBeritaId = DB::table('foto_edukasis')->insertGetId([
                        'foto_edukasi' => $fotoName
                    ]);
        
                    array_push($fotoBeritaIds, $fotoBeritaId);
                }
            }
        
            $artikelBeritaId = DB::table('artikel_edukasis')->insertGetId([
                'admin_damkar_id' => $request->id,
                'judul_edukasi' => $request->judul,
                'foto_edukasi_id' => '1',
                'deskripsi' => $request->isi_artikel,
                'tgl_edukasi' => Carbon::now()
            ]);
        
            foreach ($fotoBeritaIds as $fotoBeritaId) {
                DB::table('foto_edukasis')->insert([
                    'id' => $fotoBeritaId,
                    'foto_edukasi' => $fotoName
                ]);
            }
        
            return redirect()->route('edukasi.index')
                             ->with('success','Artikel Berhasil Ditambahkan!');
        }

}