<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use \Carbon\Carbon;

class BeritaController extends Controller
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

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('/login')->with('error', 'Anda harus login terlebih dahulu');
    }
    
    
    public function index() {
        $berita = DB::table('artikel_beritas')->get();
        $title = 'Berita | E-Damkar Nganjuk';
        return view('backend.berita', compact('berita','title'));

    }

    public function create()
    {
        $berita = null;
        return view('backend.berita.create', compact('berita'));
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
        $berita = DB::table('artikel_beritas')->where('id_berita', $berita->id_berita)->first();
        return view('backend.berita.create', compact('berita'));
    }
    
    public function update(Request $request, $id)
    {
        $destinationPath = public_path().'/img-berita';
        $fotoFile = '';
            
        if ($request->hasFile('foto')) {
            $fotoFile = $this->uploadFile($request->file('foto'), $destinationPath);
        }
            
        $dataToUpdate = [
            'judul_berita' => $request->input('judul'),
            'deskripsi_berita' => $request->input('isi_artikel'),
            'tgl_berita' => Carbon::now()
        ];
            
        if ($fotoFile !== '') {
            $dataToUpdate['foto'] = $fotoFile;
        }
            
        DB::table('artikel_beritas')->where('id_berita', $id)->update($dataToUpdate);
        
        return redirect()->route('berita.index')->with('success', 'Artikel berhasil diperbarui!');
    }
    
    
    public function destroy($id)
    {
        

        DB::table('artikel_beritas')->where('id_berita',$id)->delete();
        return redirect()->route('berita.index')
                         ->with('success', 'Artikel Berhasil dihapus!');



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
             $destinationPath = public_path('img-berita');
             $fotoFile = '';
         
             if ($request->hasFile('foto')) {
                 $foto = $request->file('foto');
                 $filename = time() . '.' . $foto->getClientOriginalExtension();
                 $fotoFile = $foto->move($destinationPath, $filename);
             }
         
             DB::table('artikel_beritas')->insert([
                 'admin_damkar_id' => $request->id,
                 'judul_berita' => $request->input('judul'),
                 'foto_artikel_berita' => $filename,
                 'deskripsi_berita' => $request->input('isi_artikel'),
                 'tgl_berita' => Carbon::now()
             ]);
        
      
            return redirect()->route('berita.index')
                             ->with('success','Artikel Berhasil Ditambahkan!');
        }

}