<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Trait\Searchable;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use Searchable;

    public function index(Request $request)
    {
//        auth()->loginUsingId(User::where("username","ciporizoma")->first()->id);
        return view("welcome");
    }
}
