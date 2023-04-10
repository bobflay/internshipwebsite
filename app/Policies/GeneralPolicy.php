<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneralPolicy
{
    use HandlesAuthorization;

    public function isAdmin($user){
        return in_array($user->email,[
            'bob.fleifel@gmail.com',
            'aliredahajj066@gmail.com'
        ]);
    }
}
