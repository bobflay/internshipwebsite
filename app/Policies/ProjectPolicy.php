<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy extends GeneralPolicy
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


    public function view(User $user, Project $project)
    {
        return $this->isAdmin($user)|| true;
    }


    public function create(User $user)
    {
        return $this->isAdmin($user) ;
    }

    public function update(User $user, Project $project)
    {

        return $this->isAdmin($user) || true;;
    }


    public function delete(User $user, Project $project)
    {
        return $this->isAdmin($user);    
    }


    public function restore(User $user, Project $project)
    {
        return $this->isAdmin($user);
    }


    public function forceDelete(User $user, Project $project)
    {
        return $this->isAdmin($user);
    }


}
