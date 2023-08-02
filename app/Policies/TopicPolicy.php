<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy extends GeneralPolicy
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


    public function view(User $user, Topic $topic)
    {
        return true;
    }


    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    public function update(User $user, Topic $topic)
    {

        return $this->isAdmin($user);
    }


    public function delete(User $user, Topic $topic)
    {
        return $this->isAdmin($user);    
    }


    public function restore(User $user, Topic $topic)
    {
        return $this->isAdmin($user);
    }


    public function forceDelete(User $user, Topic $topic)
    {
        return $this->isAdmin($user);
    }


}
