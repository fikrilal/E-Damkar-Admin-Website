<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
    
    public function updateprofil(Request $request)
{
    $user = Auth::user();

    $rules = [
        'nama_lengkap' => 'required',
        'email' => ['required', 'email', Rule::unique('admin_damkars')->ignore($user->id)],
        'no_hp' => 'required|min:10|max:12'
    ];
    $messages = [
        'nama_lengkap.required' => 'Kolom nama lengkap harus diisi.',
        'email.required' => 'Kolom email harus diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'no_hp.required' => 'Kolom nomor HP harus diisi.',
        'no_hp.min' => 'Nomor HP harus terdiri dari 10-12 karakter.',
        'no_hp.max' => 'Nomor HP tidak boleh lebih dari 12 karakter.'
    ];
    if (!empty($request->input('password'))) {
        $rules['password'] = 'required|min:8';
        $messages['password.required'] = 'Kolom kata sandi harus diisi.';
        $messages['password.min'] = 'Kata Sandi minimal harus terdiri dari 8 karakter.';
    }

    $request->validate($rules, $messages);

    $updateData = [
        'nama_lengkap' => $request->input('nama_lengkap'),
        'email' => $request->input('email'),
        'noHp' => $request->input('no_hp')
    ];

    if (!empty($request->input('password'))) {
        $updateData['password'] = Hash::make($request->input('password'));
    }

    DB::table('admin_damkars')
        ->where('id', $user->id)
        ->update($updateData);

    // Mengembalikan respons atau melakukan redirect
    return redirect()->back()->with('success', 'Data profil berhasil diperbarui.');
}


    

    
}