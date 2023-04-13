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
    
    public function index() {
        $berita = DB::table('artikel_beritas')->get();
        return view('backend.berita', compact('berita'));

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
            'dekspripsi_berita' => $request->input('isi_artikel'),
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
            $destinationPath = public_path().'/img-berita/';
            $fotoBeritaIds = array();
        
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $foto) {
                    $fotoName = uniqid().'.'.$foto->getClientOriginalExtension();
                    $foto->move($destinationPath, $fotoName);
        
                    $fotoBeritaId = DB::table('foto_beritas')->insertGetId([
                        'foto_berita' => $fotoName
                    ]);
        
                    array_push($fotoBeritaIds, $fotoBeritaId);
                }
            }
        
            $artikelBeritaId = DB::table('artikel_beritas')->insertGetId([
                'admin_damkar_id' => $request->id,
                'kategori_artikel_id' => '1',
                'judul_berita' => $request->judul,
                'foto_berita_id' => '1',
                'dekspripsi_berita' => $request->isi_artikel,
                'tgl_berita' => Carbon::now()
            ]);
        
            foreach ($fotoBeritaIds as $fotoBeritaId) {
                DB::table('foto_beritas')->insert([
                    'id' => $fotoBeritaId,
                    'foto_berita' => $fotoName
                ]);
            }
        
            return redirect()->route('berita.index')
                             ->with('success','Artikel Berhasil Ditambahkan!');
        }

}