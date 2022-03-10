<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::where("username",$username)->first();
        if (is_null($user)) return to_route("index");


        return view("profile",compact('user'));
    }

    public function send(Request $request,User $user)
    {
       $validData = $request->validate([
          "text" => "required",
       ]);

       $message = Message::create([
          "text" => $validData["text"],
          "user_id" => Auth::id()
       ]);

       $message->users()->attach($user->id);

       return back();

    }
}

// messages-> user_id , text , time ,
// $user->messages($user2);
