<?php 
namespace ThomasRag\Mixsenger;

use Illuminate\Support\ServiceProvider;

class MixsengerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('thomas-rag/mixsenger');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	   $this->app['mixsenger'] = $this->app->share(function($app)
  {
    return new Mixsenger;
  });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
