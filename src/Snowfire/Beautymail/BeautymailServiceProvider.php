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
		$this->publishes([
			__DIR__.'/../../config/templates.php' => config_path('beautymail.php')
		], 'config');

		$this->publishes([
			__DIR__ . '/../../../public' => public_path('vendor/beautymail'),
		], 'public');

		$this->loadViewsFrom(__DIR__ . '/../../views', 'beautymail');

        $this->app['mailer']->getSwiftMailer()->registerPlugin(new CssInlinerPlugin());
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
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
