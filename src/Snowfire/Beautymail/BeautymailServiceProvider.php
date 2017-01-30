<?php

namespace Snowfire\Beautymail;

use Illuminate\Support\ServiceProvider;

class BeautymailServiceProvider extends ServiceProvider
{
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
            __DIR__.'/../../config/settings.php' => config_path('beautymail.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../../public' => public_path('vendor/beautymail'),
        ], 'public');

        $this->loadViewsFrom(__DIR__.'/../../views', 'beautymail');

        try {
            $this->app['mailer']->getSwiftMailer()->registerPlugin(new CssInlinerPlugin());
        } catch (\Exception $e) {
            \Log::debug('Skipped registering SwiftMailer plugin: CssInlinerPlugin.');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Snowfire\Beautymail\Beautymail',
            function ($app) {
                return new \Snowfire\Beautymail\Beautymail(
                    array_merge(
                        config('beautymail.view'),
                        [
                            'css' => !is_null(config('beautymail.css')) && count(config('beautymail.css')) > 0 ? implode(' ', config('beautymail.css')) : '',
                        ]
                    )
                );
            });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
