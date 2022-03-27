<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Group extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "name",
        "unique_id",
        "private_link",
        "desc",
        "chat_history",
        "profile",
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,"group_user")->withPivot("is_admin")->withTimestamps();
    }

    protected function uniqueId(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::slug($value),
        );
    }
    public function messages()
    {
        return $this->belongsToMany(Message::class,"group_message")->withTimestamps();
    }
}
