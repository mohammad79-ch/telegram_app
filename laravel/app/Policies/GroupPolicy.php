<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user,Group $group)
    {
        return $user->id == $group->user_id || !!$group->users()->where(["is_admin"=>TRUE,"user_id"=>$user->id])->first();
    }
}
