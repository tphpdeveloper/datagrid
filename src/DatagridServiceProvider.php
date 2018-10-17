<?php

/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview;

use App;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

use Tphpdeveloper\Gridview\Datagrid\BuilderDataGrid;
use View;
use File;


class DatagridServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->singleton('datagrid', function($app){
            return new BuilderDataGrid();
        });

        App::alias('datagrid', BuilderDataGrid::class);
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        dump(app());
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return ['datagrid', BuilderDataGrid::class];
    }

}
