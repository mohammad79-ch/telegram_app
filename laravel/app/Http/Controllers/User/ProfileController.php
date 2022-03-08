<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::where("username",$username)->first();
        if (is_null($user)) return to_route("index");

        dd($user);
    }
}
