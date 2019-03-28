<?php

namespace SmartOver\Countries;

use SmartOver\Countries\Models\Country\Country;
use Illuminate\Console\Command;

/**
 * Class FetchCountriesCommand
 * @package SmartOver\Countries
 */
class FetchCountriesCommand extends Command
{

    /**
     * @var string
     */
    protected $signature = 'countries:fetch {--show}';

    /**
     * @var string
     */
    protected $description = 'Fetch all countries from restcountries.eu';


    /**
     * Fetch countries
     *
     * @return void
     */
    public function handle()
    {

        $data = json_decode(file_get_contents('https://restcountries.eu/rest/v2/all'));

        Country::getQuery()->delete();

        foreach ($data as $country) {

            if ( ! $country->numericCode) {

                $this->warn("id is missing $country->name");

            } else {

                $name['en'] = $country->name;

                foreach ($country->translations as $lang => $translation) {
                    $name[$lang] = $translation;
                }

                (new Country([
                    'id'          => $country->numericCode,
                    'name'        => $name,
                    'alpha2Code'  => $country->alpha2Code,
                    'alpha3Code'  => $country->alpha3Code,
                    'region'      => $country->region,
                    'subregion'   => $country->subregion,
                    'timezone'    => $country->timezones[0],
                    'nativeName'  => $country->nativeName,
                    'numericCode' => $country->numericCode,
                ]))->save();

                if ($this->option('show')) {
                    $this->info("$country->name added");
                }
            }
        }
    }
}