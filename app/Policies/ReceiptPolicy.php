<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Receipt;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReceiptPolicy extends GeneralPolicy
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



    public function viewAny(User $user)
    {
        return $this->isAdmin($user);
    }


    public function view(User $user, Receipt $receipt)
    {
        return $this->isAdmin($user);
    }


    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    public function update(User $user, Receipt $receipt)
    {

        return $this->isAdmin($user);
    }


    public function delete(User $user, Receipt $receipt)
    {
        return $this->isAdmin($user);    
    }


    public function restore(User $user, Receipt $receipt)
    {
        return $this->isAdmin($user);
    }


    public function forceDelete(User $user, Receipt $receipt)
    {
        return $this->isAdmin($user);
    }


}
