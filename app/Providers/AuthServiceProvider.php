<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\User'=>'App\Policies\UserPolicy',
        'App\Models\Teacher'=>'App\Policies\TeacherPolicy',
        'App\Models\Student'=>'App\Policies\StudentPolicy',
        'App\Models\Course'=>'App\Policies\CoursePolicy',
        'App\Models\Category'=>'App\Policies\CategoryPolicy',
        'App\Models\Candidate'=>'App\Policies\CandidatePolicy',
        'App\Models\Student'=>'App\Policies\CertificatePolicy',




    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
