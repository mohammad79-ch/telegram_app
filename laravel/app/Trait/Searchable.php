<?php

namespace App\Trait;

use App\Models\User;
use Illuminate\Http\Request;

trait Searchable
{
    public function search($search)
    {
       $users = User::where("username","LIKE","%$search%")
           ->orWhere("name","LIKE","%$search%")->get();

       return $users;
    }
}
