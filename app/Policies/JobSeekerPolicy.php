<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobSeeker;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobSeekerPolicy extends GeneralPolicy
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
     * @param  \App\Models\JobSeeker  $job_seeker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, JobSeeker $job_seeker)
    {
        return $this->isAdmin($user)|| $user->email == $job_seeker->email;
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
     * @param  \App\Models\job_s$job_seeker  $job_seeker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, JobSeeker $job_seeker)
    {

        return $this->isAdmin($user) || $user->email == $job_seeker->email;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job_s$job_seeker  $job_seeker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, JobSeeker $job_seeker)
    {
        return $this->isAdmin($user);    
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job_s$job_seeker  $job_seeker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, JobSeeker $job_seeker)
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job_s$job_seeker  $job_seeker
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, JobSeeker $job_seeker)
    {
        return $this->isAdmin($user);
    }
}
