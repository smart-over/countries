<?php

namespace SmartOver\Countries\Models\Country;

use SmartOver\MicroService\Model\BaseMultiLangModel;

/**
 * Class Country
 *
 * @property integer $id
 * @property string $name
 * @property string $alpha2Code
 * @property string $alpha3Code
 * @property string $region
 * @property string $subregion
 * @property string $timezone
 * @property string $nativeName
 * @property string $numericCode
 *
 *
 * @package SmartOver\Countries\Models\Country
 */
class Country extends BaseMultiLangModel
{

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $table = 'country';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'alpha2Code',
        'alpha3Code',
        'region',
        'subregion',
        'timezone',
        'nativeName',
        'numericCode',
    ];

    /**
     * @var array
     */
    protected $hidden = ['translateName', 'isDeleted'];

    /**
     * @var string
     */
    protected $langTable = 'countryTranslate';

    /**
     * @var string
     */
    protected $foreignField = 'countryId';

    /**
     * @var array
     */
    protected $translatableFields = ['name'];

    /**
     * @var string
     */
    protected $translateModel = \SmartOver\Countries\Models\Country\CountryTranslate::class;
}