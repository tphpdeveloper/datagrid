<?php

/**
 * Tphpdeveloper/Datagrid
 *
 * @author    Igor <igorkutsan@ukr.net>
 * @copyright 2018 Tphpdeveloper/Datagrid
 * @license   https://opensource.org/licenses/MIT
 */

namespace Tphpdeveloper\Datagrid;

use App;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

use View;
use File;


class DatagridServiceProvider extends ServiceProvider
{

    protected $providers = [];

	protected $aliases = [];

    /**
     *  Register application services.
     */
    public function register()
    {
        $this->registerProviders();
		$this->registerAliases();
		$this->registerFactory();

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMiddleware();
        $this->registerResources();
        $this->registerViewComposerData();
        $this->registerCommands();
        $this->publishesFile();

    }

    /**
     * Registering services
     */
    protected function registerProviders()
    {
        if(count($this->providers)) {
            foreach ($this->providers as $provider) {
                App::register($provider);
            }
        }
    }

	/**
     * Registering facades
     */
    protected function registerAliases()
    {
        if(count($this->aliases)) {
            foreach ($this->aliases as $alias => $facade) {
                App::alias($alias, $facade);
            }
        }
    }

    /**
     * Registering middleware
     *
     * @return void
     */
    protected function registerMiddleware()
    {
        $router = $this->app['router'];
//        $router->aliasMiddleware('main_lang', SetMainLanguage::class);
    }

    /**
     * Registering resource
     * e.g. Route, View, Database path & Translation
     *
     * @return void
     */
    protected function registerResources()
    {

        

    }

    /**
     * Registering Class Based View Composer
     *
     * @return void
     */
    protected function registerViewComposerData()
    {
		/*
		View::composer([
            config('myself.folder').'.helpers.lang_switch',
            config('myself.folder').'.components.form.*',
		], LangComposer::class);
		*/

    }

    /**
     * Registration myself artisan commands
     */
    protected function registerCommands()
    {
		/*
        if($this->app->runningInConsole()){
            $this->commands([
                CmsVendorPublish::class
            ]);
        }
		*/

    }

    /**
     * Publish file
     */
    protected function publishesFile()
    {
		/*
        $this->publishes([
            __DIR__.'/config/myself.php' => config_path('myself.php')
        ], 'tphpdeveloper_backend_config');
		*/
		


    }

	public function registerFactory(){
		//$this->app->make(Factory::class)->load(__DIR__ . '/database/factories');
	}

}
