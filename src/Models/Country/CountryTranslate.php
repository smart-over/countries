<?php

namespace SmartOver\Countries\Models\Country;

use SmartOver\MicroService\Model\BaseMultiLangModel;

/**
 * Class CountryTranslate
 * @package SmartOver\Countries\Models\Country
 */
class CountryTranslate extends BaseMultiLangModel
{

    /**
     * @var string
     */
    protected $table = 'countryTranslates';

    /**
     * @var array
     */
    protected $fillable = ['countryId', 'langCode', 'translateName'];

}