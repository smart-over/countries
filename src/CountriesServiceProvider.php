<?php

namespace SmartOver\Countries;

use Illuminate\Support\ServiceProvider;

/**
 * Class CountriesServiceProvider
 * @package SmartOver\Countries
 */
class CountriesServiceProvider extends ServiceProvider
{

    protected $commands = [
        'SmartOver\Countries\FetchCountriesCommand',
    ];

    /**
     *
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations');

    }

    /**
     *
     */
    public function register()
    {
        $this->commands($this->commands);
    }

}