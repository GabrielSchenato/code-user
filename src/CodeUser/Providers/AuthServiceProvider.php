<?php

namespace CodePress\CodeUser\Providers;

use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (!app()->runningInConsole()) {
            $permissionRepository = app(PermissionRepositoryInterface::class);
            $permissions = $permissionRepository->all();
            foreach ($permissions as $p) {
                Gate::define($p->name, function ($user) use ($p) {
                    return $user->isAdmin() || $user->hasRole($p->roles);
                });
            }
        }
    }

}
