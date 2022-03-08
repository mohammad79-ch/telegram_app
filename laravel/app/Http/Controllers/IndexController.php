<?php

namespace App\Http\Controllers;

use App\Trait\Searchable;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    use Searchable;

    public function index(Request $request)
    {
        $users = [];
        if ($request->has("search") && !empty($request->get("search"))){
           $users =  $this->search($request->search);
        }
        return view("welcome",compact("users"));
    }
}
