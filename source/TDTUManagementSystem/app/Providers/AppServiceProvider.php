<?php

namespace App\Providers;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\Major;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        View::composer(['home'], function ($view) {
            if (Auth::check() && Gate::allows('student')) {
                $user = Auth::user();
                $group = Group::find($user->student->id_group);
                $major = Major::find($user->student->id_major);

                $view->with([
                    'user' => $user,
                    'group' => $group,
                    'major' => $major,
                    'faculties' => Faculty::where('id', $group->id_faculty)->where('id', $major->id_faculty)->get()
                ]);
            } else {
                abort(403);
            }

        });
        View::composer(['dashboard'], function ($view) {
            if (Auth::check() && Gate::allows('student') && Gate::allows('admin')) {
                $view->with([
                    'user' => Auth::user()->student
                ]);
            } else if (Auth::check() && Gate::allows('teacher') && Gate::allows('admin')) {
                $view->with([
                    'user' => Auth::user()->teacher
                ]);
            }
        });
    }
}
