<?php

namespace App\Policies;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidatePolicy extends GeneralPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Candidate $candidate)
    {
        return $this->isAdmin($user)|| $user->email == $candidate->email;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Candidate $candidate)
    {

        return $this->isAdmin($user) || $user->email == $candidate->email;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Candidate $candidate)
    {
        return $this->isAdmin($user);    
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Candidate $candidate)
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Candidate $candidate)
    {
        return $this->isAdmin($user);
    }
}
