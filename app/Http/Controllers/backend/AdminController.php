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
        $admin = Admin::all();
        return view('backend.kelolaadmin', compact('admin'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_admin' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'noHp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new admin record in the database
        $admin = new Admin;
        $admin->nama_admin = $request->input('nama_admin');
        $admin->email = $request->input('email');
        $admin->password = $request->input('password');
        $admin->noHp = $request->input('noHp');
        // Add any additional fields you have

        // Save the admin record
        $admin->save();

        return redirect()->back()->with('success', 'Admin successfully added.');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_admin' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = Admin::findOrFail($request->input('id'));
        $admin->nama_admin = $request->input('nama_admin');
        $admin->email = $request->input('email');
        // Add any additional fields you have

        // Save the updated admin record
        $admin->save();

        return redirect()->back()->with('success', 'Admin successfully updated.');
    }
}