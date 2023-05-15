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
    
    public function index()
    {
        $title = 'Kelola Admin | E-Damkar Nganjuk';
        $data = User::orderBy('nama_lengkap', 'asc')->get(); // Mengurutkan berdasarkan nama_lengkap secara ascending
        return view('backend.kelolaadmin', compact('data', 'title'));
    }
    

}