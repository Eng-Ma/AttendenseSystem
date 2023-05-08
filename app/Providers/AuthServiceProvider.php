<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Course;
use App\Models\User;
use App\Policies\CoursePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Course::class => CoursePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $user_model) {
            // dd($user_model);
            // return $user->is($user_model);
        });
        // $this->registerPolicies();

        // Gate::define('create-course', function (User $user, Course $course_model) {
        //     dd("testGate");
        //     return auth()->guard('api')->check();
        // });

        // Gate::policy(User::class, UserPolicy::class);
    }
}
