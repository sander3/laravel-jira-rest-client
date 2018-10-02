<?php

namespace Atlassian\JiraRest;

use Atlassian\JiraRest\Providers\RouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class JiraRestServiceProvider extends ServiceProvider
{

    const CONFIG_KEY = 'atlassian.jira';

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/jira.php' => config_path('atlassian/jira.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/jira.php', static::CONFIG_KEY
        );

        // TODO: Add flag for user if default routes should be added
        $this->app->register(RouteServiceProvider::class);
    }
}