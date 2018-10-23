<?php

/**
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Gridview;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

use Tphpdeveloper\Gridview\Datagrid\BuilderDataGrid;
use View;
use File;
use Form;



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
            return new BuilderDataGrid($app['request']);
        });

    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
		//dd($this->app);
        $this->publishesFile();
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
	
    public function provides()
    {
        return ['datagrid', 'BuilderDataGrid'];
    }
	

    /**
     * Publish file
     */
    protected function publishesFile()
    {
        $this->publishes([
            __DIR__.'/config/datagrid.php' => config_path('datagrid.php')
        ], 'datagrid_config');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views')
        ], 'datagrid_view');

    }
}
