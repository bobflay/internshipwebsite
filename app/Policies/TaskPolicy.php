<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy extends GeneralPolicy
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


    public function view(User $user, Task $task)
    {
        return $this->isAdmin($user)|| true;
    }


    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    public function update(User $user, Task $task)
    {

        return $this->isAdmin($user);
    }


    public function delete(User $user, Task $task)
    {
        return $this->isAdmin($user);    
    }


    public function restore(User $user, Task $task)
    {
        return $this->isAdmin($user);
    }


    public function forceDelete(User $user, Task $task)
    {
        return $this->isAdmin($user);
    }


}
