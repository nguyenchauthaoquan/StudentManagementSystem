<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        Schema::defaultStringLength(300);
        View::composer(['home', 'dashboard'], function ($view) {
            if (Auth::check()) {
                $student = Student::find(auth()->user()->account);
                $teacher = Teacher::find(auth()->user()->account);
                $user = null;
                if ($student) {
                    $user = $student;
                }
                if ($teacher) {
                    $user = $teacher;
                }
            }

            $view->with('user', $user);
        });
    }
}
