<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use \Carbon\Carbon;
use App\Models\User;


class AdminController extends Controller
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
        $admin = DB::table('admin_damkars')->get();
        $title = "Kelola Admin";
        $data = User::orderBy('nama_lengkap', 'asc')->get(); // Mengurutkan berdasarkan nama_lengkap secara ascending
        return view('backend.kelolaadmin', compact('data', 'title'));
    }

    public function store(Request $request)
        {

        $request->validate([
            'nama_admin' => 'required',
            'password' => ['required', 'string', 'min:8'],
            'noHp' => ['required', 'string', 'max:12'],
        ], [
            'nama_admin.required' => 'Nama admin wajib diisi',
            'email.required' => 'Email admin wajib diisi',
            'password.min' => 'Kata sandi minimal memiliki 8 karakter',
            'noHp.max' => 'Nomor telepon maksimal memiliki 12 angka',
        ]);
    
        DB::table('admin_damkars')->insert([
            'id' => $request->id,
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
        ]);
    
        return redirect()->route('admin.index')->with('success', 'Data admin berhasil ditambahkan!');
}
    
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_admin' => 'required',
        'password' => ['required', 'string', 'min:8'],
        'noHp' => ['required', 'string', 'max:12'],
    ], [
        'nama_admin.required' => 'Nama admin wajib diisi',
        'email.required' => 'Email admin wajib diisi',
        'password.min' => 'Kata sandi minimal memiliki 8 karakter',
        'noHp.max' => 'Nomor telepon maksimal memiliki 12 angka',
    ]);


    $admin = DB::table('admin_damkars')->where('id', $id)->first();

    DB::table('admin_damkars')->where('id', $id)->update([
        'id' => $request->id,
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
    ]);

    return redirect()->route('admin.index')->with('success', 'Data admin berhasil diperbarui!');
}
}