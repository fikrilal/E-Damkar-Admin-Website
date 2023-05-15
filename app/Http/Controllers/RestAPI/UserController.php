<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserListResource;
use App\Models\user_listData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    $request->validate(['id' => 'required' , 'password_lama' => 'required' , 'password_baru' => 'required' ]);
    
    $ambilPasswordLama = DB::table('user_list_data')->where('id','=',$request->id)->first();

    if(Hash::check($request->password_lama , $ambilPasswordLama->password)){
        $encryptedPassword = Hash::make($request->password_baru);

        
        DB::table('user_list_data')->where('id','=',$request->id)->update([
            'password' => $encryptedPassword
           
        ]);
        $data = [
            'status' => 'berhasil',
            'kode' => '200'
        ];
        return json_encode($data);


    }else{ 
        
        $data = [
        'status' => 'gagal',
        'kode' => '400'
    ];
    return json_encode($data);}
}
public function UpdateProfil(Request $request)
    {
        $validateData = $request->validate([
            'id'=>'required',
            'namaLengkap' => 'required',
            'noHp' => 'required',
           // 'foto_user' => 'required',
        ]);
        $verifdata = user_listData::where('id',$validateData['id']) -> first();
        $verifdata -> namaLengkap = $validateData ['namaLengkap'];
        //$verifdata -> foto_user = $validateData ['foto_user'];
        $verifdata -> noHp = $validateData ['noHp'];
        $verifdata -> save();

        $data = [
            'status' => 'berhasil',
            'kode' => '200'
        ];
        return json_encode($data);
        
    }
}
