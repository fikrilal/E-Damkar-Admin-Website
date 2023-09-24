<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;

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


    public function index()
    {
        $berita = DB::table('artikel_beritas')
            ->orderBy('tgl_berita', 'desc')
            ->get();
        $title = 'Berita | E-Damkar Nganjuk';
        return view('backend.berita', compact('berita', 'title'));
    }

    public function create()
    {
        $berita = null;
        return view('backend.berita.create', compact('berita'));
    }

    // private function uploadFile($fileName = '', $destinationPath = '')
    // {
    //     $fileOriginalName = $fileName->getClientOriginalName();
    //     $timeStringFile = md5(time() . mt_rand(1, 10)) . $fileOriginalName;
    //     $fileName->move($destinationPath, $timeStringFile);
    //     return $timeStringFile;
    // }


    public function edit(BeritaController $berita)
    {
        $berita = DB::table('artikel_beritas')->where('id_berita', $berita->id_berita)->first();
        return view('backend.berita.create', compact('berita'));
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
            'foto.max' => 'Ukuran file tidak boleh lebih dari 2 MB.'
        ]);

        $destinationPath = public_path('img-berita');
        $fotoFile = '';

        $berita = DB::table('artikel_beritas')->where('id_berita', $id)->first();

        $filename = $berita->foto_artikel_berita;

        if ($request->hasFile('foto')) {
            $destinationPath = public_path('img-berita');
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $filename);

            if (file_exists(public_path('img-berita/' . $berita->foto_artikel_berita))) {
                unlink(public_path('img-berita/' . $berita->foto_artikel_berita));
            }
        }

        DB::table('artikel_beritas')->where('id_berita', $id)->update([
            'judul_berita' => $request->input('judul'),
            'foto_artikel_berita' => $filename,
            'deskripsi_berita' => $request->input('isi_artikel'),
            'tgl_berita' => Carbon::now()
        ]);

        return redirect()->route('berita.index')->with('success', 'Artikel berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $berita = DB::table('artikel_beritas')->where('id_berita', $id)->first();

        if (!$berita) {
            return redirect()->route('berita.index')->with('error', 'Artikel tidak ditemukan!');
        }

        $fotoPath = public_path('img-berita') . '/' . $berita->foto_artikel_berita;

        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }

        DB::table('artikel_beritas')->where('id_berita', $id)->delete();

        return redirect()->route('berita.index')->with('Berhasil', 'Artikel berhasil dihapus!');
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
            'foto.max' => 'Ukuran file tidak boleh lebih dari 2 MB.'
        ]);
        $destinationPath = public_path('img-berita');
        $fotoFile = '';

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $extension = $foto->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Simpan gambar sementara
            $foto->move($destinationPath, $filename);

            // Cek ukuran gambar
            $filesize = filesize($destinationPath . '/' . $filename);
            $maxFileSize = 100 * 1024; // Ukuran maksimum 100KB

            if ($filesize > $maxFileSize) {
                // Baca gambar sementara
                if ($extension === 'png') {
                    $image = imagecreatefrompng($destinationPath . '/' . $filename);
                } elseif ($extension === 'jpg') {
                    $image = imagecreatefromjpeg($destinationPath . '/' . $filename);
                }

                // Kompresi gambar dengan mengubah kualitas
                $compressionQuality = 15; // Ganti sesuai kebutuhan
                if ($extension === 'png') {
                    imagepng($image, $destinationPath . '/' . $filename, $compressionQuality);
                } elseif ($extension === 'jpg') {
                    imagejpeg($image, $destinationPath . '/' . $filename, $compressionQuality);
                }
            }

            // Hapus file sementara jika perlu
            // unlink($destinationPath . '/' . $filename);
        } else {
            // Handle jika tidak ada file yang diunggah
        }

        DB::table('artikel_beritas')->insert([
            'admin_damkar_id' => $request->id,
            'judul_berita' => $request->input('judul'),
            'foto_artikel_berita' => $filename,
            'deskripsi_berita' => $request->input('isi_artikel'),
            'tgl_berita' => Carbon::now()
        ]);


        return redirect()->route('berita.index')
            ->with('success', 'Artikel Berhasil Ditambahkan!');
    }
}
