<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Auth\ApiFormater;
use App\Http\Controllers\Controller;
use App\Http\Resources\PetugasAdminResource;
use App\Http\Resources\UserListResource;
use App\Models\admin_damkar;
use App\Models\user_listData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class petugasController extends Controller
{
    public function index()
    {
        $userdata = admin_damkar::all();

        

        return PetugasAdminResource::collection($userdata);
    }

    public function checkLogin()
    {
        $userdata = admin_damkar::find(1);

        return new PetugasAdminResource($userdata);
    }
}
