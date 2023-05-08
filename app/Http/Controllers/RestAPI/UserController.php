<?php

namespace App\Http\Controllers\RestAPI;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserListResource;
use App\Models\user_listData;
use Illuminate\Http\Request;

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
}
