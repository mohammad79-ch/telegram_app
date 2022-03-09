<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ["text","user_id","file"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
     return $this->belongsToMany(User::class,"message_user")->withTimestamps();
    }
}
