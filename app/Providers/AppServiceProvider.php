<?php

namespace App\Providers;

use App\Models\Parking;
use App\Models\User;
use Carbon\Carbon;
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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Gate::define('kelola-user', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('masuk', function (User $user) {
            return $user->role == 'Petugas Masuk' || $user->role == 'admin';
        });

        Gate::define('keluar', function (User $user) {
            return $user->role == 'Petugas Keluar' || $user->role == 'admin';
        });
        Gate::define('ruang', function (User $user) {
            return $user->role == 'Petugas Ruang' || $user->role == 'admin';
        });
    }
}
