<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Batch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BatchPolicy extends GeneralPolicy
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
        return true;
    }


    public function view(User $user, Batch $batch)
    {
        return true;
    }


    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    public function update(User $user, Batch $batch)
    {

        return $this->isAdmin($user);
    }


    public function delete(User $user, Batch $batch)
    {
        return $this->isAdmin($user);    
    }


    public function restore(User $user, Batch $batch)
    {
        return $this->isAdmin($user);
    }


    public function forceDelete(User $user, Batch $batch)
    {
        return $this->isAdmin($user);
    }


}
