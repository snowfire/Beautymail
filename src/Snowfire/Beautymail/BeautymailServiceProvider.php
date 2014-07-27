<?php namespace Snowfire\Beautymail;

use Illuminate\Support\ServiceProvider;

class BeautymailServiceProvider extends ServiceProvider {

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
		$this->package('snowfire/beautymail');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
//		$this->app->bindShared('Snowfire\Checkout\BillableRepositoryInterface', function()
//		{
//			return new BillableEloquent;
//		});
//
//		$this->app->bindShared('command.checkout.table', function($app)
//		{
//			return new CheckoutTableCommand;
//		});
//
//		$this->commands('command.checkout.table');
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
