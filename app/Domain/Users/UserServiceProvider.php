<?php
namespace App\Domain\Users;


use App\Domain\Users\Services\PermissionService;
use App\Domain\Users\Services\RoleService;
use App\Domain\Users\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot():void
    {
        $this->registerViews();
        $this->registerRoutes();
        $this->registerLivewireComponent();
    }

    private function registerViews():void{
        $this->loadViewsFrom(__DIR__.'/Views/users', 'users');
        $this->loadViewsFrom(__DIR__.'/Views/roles', 'roles');
        $this->loadViewsFrom(__DIR__.'/Views/permissions', 'permissions');
    }

    private function registerLivewireComponent():void{
        Livewire::component('users', UserService::class);
        Livewire::component('roles', RoleService::class);
        Livewire::component('permissions', PermissionService::class);
    }

    private function registerRoutes():void{
        $this->loadRoutesFrom(__DIR__.'/Routes/users.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/roles.php');
    }
}
