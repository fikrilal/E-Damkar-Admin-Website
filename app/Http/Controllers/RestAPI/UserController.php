<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Auth\ApiFormater;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserListResource;
use App\Models\user_listData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $userdata = user_listData::all();

        return UserListResource::collection($userdata);
    }

    public function checkLogin()
    {
        $userdata = user_listData::find(1);

        return new UserListResource($userdata);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password_lama' => 'required',
            'password_baru' => 'required'
        ]);

        $ambilPasswordLama = DB::table('user_list_data')->where('id', '=', $request->id)->first();

        if (Hash::check($request->password_lama, $ambilPasswordLama->password)) {
            $encryptedPassword = Hash::make($request->password_baru);
            DB::table('user_list_data')->where('id', '=', $request->id)->update([
                'password' => $encryptedPassword
            ]);
            $data = [
                'status' => 'berhasil',
                'kode' => '200'
            ];
            return json_encode($data);
        } else {
            $data = [
                'status' => 'gagal',
                'kode' => '400'
            ];
            return json_encode($data);
        }
    }
    public function UpdateProfil(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required',
            'namaLengkap' => 'required',
            'noHp' => 'required',
            // 'foto_user' => 'required',
        ]);
        $verifdata = user_listData::where('id', $validateData['id'])->first();
        $verifdata->namaLengkap = $validateData['namaLengkap'];
        //$verifdata -> foto_user = $validateData ['foto_user'];
        $verifdata->noHp = $validateData['noHp'];
        $verifdata->save();

        $data = [
            'status' => 'berhasil',
            'kode' => '200'
        ];
        return json_encode($data);
    }

    public function UpdateFile(Request $request)
    {
        $request->validate([
            'foto_user' => 'required',
            'namaLengkap' => 'required',
            'noHp' => 'required',
            'id' => 'required'
        ]);
        $pathDeleteImage = $request->foto_user;
        if ($pathDeleteImage != null || $pathDeleteImage != "") {
            Storage::delete('foto_user/' . $pathDeleteImage);
        }


        //upload Foto
        if ($request->hasFile('file')) {
            $pathFileBaru = $request->file('file');
            $FileBaruNama = $pathFileBaru->getClientOriginalName();

            //update Akun
            $dataUpdate = user_listData::where('id', $request->id)->update(['namaLengkap' => $request->namaLengkap, 'noHp' => $request->noHp, 'foto_user' => $FileBaruNama]);
            $pathAkhir = $pathFileBaru->storeAs('foto_user', $FileBaruNama);
            return ApiFormater::createApi(200, "Succes", ['foto_dihapus' => $pathDeleteImage, 'Upload_done' => $pathAkhir, 'dataUpdate' => $dataUpdate]);
        } else {
            return ApiFormater::createApi(400, "Gagal", "Gagal");
        }
    }

    public function getDataProfile(Request $request)
    {
        $request->validate(['id' => 'required']);

        $getData = DB::table('user_list_data')->select('user_list_data.namaLengkap', 'user_list_data.email', 'user_list_data.noHp', 'user_list_data.foto_user')->where('user_list_data.id', '=', $request->id)->first();

        if ($getData != null) {
            return response()->json(['status' => 'berhasil', 'kode' => '200']);
        } else {
            return response()->json(['status' => 'gagal', 'kode' => '400']);
        }
    }

    public function GetData($id)
    {
        $contact = user_listData::select('namaLengkap', 'email', 'noHp', 'email', 'foto_user')->find($id);

        if (!$contact) {
            return response()->json(['message' => 'Kontak tidak ditemukan'], 404);
        }

        return response()->json($contact);
    }
}
