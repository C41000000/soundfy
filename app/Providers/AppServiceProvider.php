<?php

namespace App\Providers;

use App\Models\ProjetoMusical;
use App\Repositories\Eloquents\ProjetoMusicalEloquent;
use App\Models\UsuarioProjeto;
use App\Repositories\Eloquents\UsuarioProjetoEloquent;
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
        /**
         * Service UserCollection
         */
        $this->app->bind('App\Repositories\Interfaces\ProjetoMusicalInterface', 'App\Repositories\Eloquents\ProjetoMusicalEloquent');
        $this->app->bind('App\Repositories\Interfaces\ProjetoMusicalInterface', function () {
            return new ProjetoMusicalEloquent(new ProjetoMusical());
        });


        $this->app->bind('App\Repositories\Interfaces\UsuarioProjetoInterface', 'App\Repositories\Eloquents\UsuarioProjetoEloquent');
        $this->app->bind('App\Repositories\Interfaces\UsuarioProjetoInterface', function () {
            return new UsuarioProjetoEloquent(new UsuarioProjeto());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
