<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserListResource;
use App\Http\Resources\verifikasiResource;
use App\Models\user_listData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|unique:user_list_data',
            'password' => 'required',
            'namaLengkap' => 'required',
            'noHp' => 'required',
            'kodeOtp' => 'required',
            'status' => 'required',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        user_listData::create($validateData);
        return json_encode([
            "kondisi" => true,
        ]);
    }

    public function changePassword(Request $request) {
        $validateData =  $request->validate([
            'noHp' => 'required',
            'password' => 'required',
        ]);
        $changePass = user_listData::where('noHp', $validateData['noHp']) -> first();
        $changePass -> password = Hash::make($validateData['password']);
        $changePass -> save();
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
            throw ValidationException::withMessages([]);
        }
        $data = [
            'token' => $user->createToken($request->username)->plainTextToken,
            'data' => $user
        ];

        return json_encode($data);
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
}
