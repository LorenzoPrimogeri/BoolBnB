<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function getAuthUser($id)
    {
        /* dd(Auth::user()); */
        $user = User::where("id",$id)->get();
        return response()->json($user, 200);
    }
}
