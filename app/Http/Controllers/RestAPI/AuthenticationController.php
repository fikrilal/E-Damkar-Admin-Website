<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginPostResource;
use App\Http\Resources\LoginPetugasResource;
use App\Http\Resources\UserListResource;
use App\Http\Resources\verifikasiResource;
use App\Models\admin_damkar;
use App\Models\user_listData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:user_list_data,username',
            'password' => 'required',
            'namaLengkap' => 'required',
            'noHp' => 'required|unique:user_list_data,noHp',
            'kodeOtp' => 'required',
            'status' => 'required',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        user_listData::create($validateData);
        return json_encode([
            "status" => true,
        ]);
    }

    public function changePassword(Request $request)
    {
        $validateData =  $request->validate([
            'noHp' => 'required',
            'password' => 'required',
        ]);
        $changePass = user_listData::where('noHp', $validateData['noHp'])->first();
        $changePass->password = Hash::make($validateData['password']);
        $changePass->save();
        return json_encode([
            "kondisi" => true,
        ]);
    }

    public function postVerification(Request $request)
    {
        $validateData = $request->validate([
            'noHp' => 'required',
            'kodeOtp' => 'required',
            'status' => 'required',
        ]);
        $verifdata = user_listData::where('noHp', $validateData['noHp'])->first();
        $verifdata->kodeOtp = $validateData['kodeOtp'];
        $verifdata->status = $validateData['status'];
        $verifdata->save();
        return json_encode([
            "kondisi" => true,
        ]);
    }

    public function verfikasiRegister(Request $request)
    {
        $dataverif = user_listData::where('noHp', $request->noHp)->first();
        return $dataverif->kodeOtp;
    }

    public function getNoHp(Request $request)
    {
        $data = user_listData::where('noHp', $request->text)->get();
        return UserListResource::collection($data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = user_listData::where('username', $request->username)->orWhere('noHp', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return new LoginPostResource(false, null, 'Periksa Kembali username/NoWhatsapp dan password anda', null);
        } else if ($user->status != "Verified") {
            return new LoginPostResource(false, null, 'Akun Anda Belum Terverifikasi', null);
        } else {
            $token = $user->createToken($request->username)->plainTextToken;
            return new LoginPostResource(true, $token, 'Berhasil', $user);
        }
    }

    //petugas
    public function loginPetugas(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = admin_damkar::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return new LoginPetugasResource(false, null, 'Periksa Kembali Email dan password anda', null);
        }  else {
            $token = $user->createToken($request->email)->plainTextToken;
            return new LoginPetugasResource(true, $token, 'Berhasil', $user);
        }
    }


    public function logout(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = user_listData::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'problem' => ['The provided credentials are incorrect.'],
            ]);
        }

        if ($user->tokens()->where('tokenable_id', $request->id)->where('name', $request->email)->delete()) {
            return json_encode(['message' => 'berhasil']);
        }
        return json_encode(['message' => 'gagal']);
    }

    public function getHP(Request $request)
    {

        $data = user_listData::where('noHp', $request->text)->get();
        return UserListResource::collection($data);
    }


    public function verifOtpWhatsapp(Request $request)
    {
        $token = "B@!Q7v38HEvuvt5i6YSU";

        $request->validate([
            'kodeOtp' => 'required',
            'noHp' => 'required',
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0, +CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $request->noHp,
                'message' => "Kode verifikasi Anda: " . $request->kodeOtp,

            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
