<?php

namespace App\Policies;

use App\Models\Baby;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BabyPolicy
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

    public function update(User $user, Baby $baby)
    {
        return ($user->id === $baby->user_id || $baby->user->partners->contains($user->id));
    }

    public function delete(User $user, Baby $baby)
    {
        return $user->id === $baby->user_id;
    }

    public function show(User $user, Baby $baby)
    {
        return $user->id === $baby->user_id;
    }
}
