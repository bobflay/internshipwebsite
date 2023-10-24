<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificatePolicy extends GeneralPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
        return $this->isAdmin($user);
    }


    public function view(User $user, Student $student)
    {
        return $this->isAdmin($user);
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
     * @param  \App\Models\Student $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Student $student)
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Student $student)
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Student $student)
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Student $student)
    {
        return $this->isAdmin($user);
    }




}