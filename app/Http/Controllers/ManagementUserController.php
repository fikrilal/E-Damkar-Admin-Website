<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ManagementUserController extends Controller {
    public function index() {
        return "Halo masbro, wawasanku luas banget";
    }

    public function create() {
        return "Untuk menampilkan form untuk menambah data user";
    }

    public function store(Request $request) {
        return "Untuk menciptakan data user yang baru";
    }

    public function show($id) {
        return "Untuk mengambil satu data user dengan id" . $id;
    }

    public function edit($id) {
        return "Menampilkan form untuk mengubah data edit dengan id=" . $id;
    }

    public function update(Request $request, $id) {
        return "Mengubah data user dengan id=" . $id;
    }

    public function destroy ($id) {
        return "Menghapus data user dengan id=" . $id;
    }
}
