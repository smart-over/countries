<?php
namespace SmartOver\Countries;

/**
 * Class CountryController
 * @package SmartOver\Countries
 */
class CountryController
{

    /**
     * @return string
     */
    public function fetch()
    {

        $response = new \Symfony\Component\Console\Output\BufferedOutput();
        \Illuminate\Support\Facades\Artisan::call('countries:fetch', ['--show' => true], $response);

        return $response->fetch();

    }

}