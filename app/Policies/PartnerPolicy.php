<?php

namespace App\Policies;

use App\Models\Baby;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
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


    public function create(User $user, User $partner)
    {
        return $user->id !== $partner->id;
    }
}
