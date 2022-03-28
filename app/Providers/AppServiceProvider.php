<?php

namespace App\Providers;

use App\Models\school;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
        Model::unguard();
        Gate::define('teacher-admin', function (teacher $teacher) {

            if ($teacher->position->status == 1) {


                if (request()->route('school')) {

                    return request()->route('school')->id == $teacher->school_id;
                } elseif (request()->route('id')) {

                    return request()->route('id') == $teacher->school_id;
                } else {

                    return true;
                }
            } else {

                return false;
            }
        });
    }
}
