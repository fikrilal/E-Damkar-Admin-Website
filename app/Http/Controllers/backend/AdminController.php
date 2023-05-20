<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use \Carbon\Carbon;
use App\Models\User;
use App\Models\admin_damkar;
use Illuminate\Support\Facades\Hash;


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
    
    
    public function index()
    {
        $title = 'Kelola Admin | E-Damkar Nganjuk';
        $data = User::orderBy('nama_lengkap', 'asc')->get(); // Mengurutkan berdasarkan nama_lengkap secara ascending
        return view('backend.kelolaadmin', compact('data', 'title'));
    }
    
    public function store(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama_admin' => 'required',
            'email' => 'required|email|unique:admin_damkars',
            'password' => 'required|min:8',
            'noHp' => 'required'
        ]);

        // Simpan admin Damkar ke database
        $admin = new admin_damkar;
        $admin->nama_lengkap = $request->nama_admin;
        $admin->email = $request->email;
        $admin->password =  Hash::make($request->input('password'));
        $admin->noHp = $request->noHp;
        $admin->kedudukans_id = 2 ;
        $admin->save();

        return redirect()->route('kelolaadmin.index')->with('success', 'Data admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admin = admin_damkar::findOrFail($id);
        return view('kelolaadmin.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama_admin' => 'required',
            'email' => 'required|email|unique:admin_damkars,email,' . $request->id,
            'noHp' => 'required',
            'password' => 'nullable|min:8',
            // Tambahkan validasi tambahan sesuai kebutuhan
        ]);

        // Cari admin yang akan diupdate
        $admin = admin_damkar::findOrFail($request->id);

        // Update data admin
        $admin->nama_lengkap = $request->nama_admin;
        $admin->email = $request->email;
        $admin->noHp = $request->noHp;
        if ($request->password) {
            $admin->password = Hash::make($request->input('password'));
        }
        // Update kolom lainnya sesuai kebutuhan

        $admin->save();

        return redirect()->route('kelolaadmin.index')->with('success', 'Data admin berhasil diupdate.');
    }

}