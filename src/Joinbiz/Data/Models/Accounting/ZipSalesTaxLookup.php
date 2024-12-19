<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $zip_code
 * @property string $state_code
 * @property string $city
 * @property string $county
 * @property string $from_date
 * @property string $county_fips
 * @property string $county_default
 * @property string $general_default
 * @property string $inside_city
 * @property string $geo_code
 * @property float $state_sales_tax
 * @property float $city_sales_tax
 * @property float $city_local_sales_tax
 * @property float $county_sales_tax
 * @property float $county_local_sales_tax
 * @property float $combo_sales_tax
 * @property float $state_use_tax
 * @property float $city_use_tax
 * @property float $city_local_use_tax
 * @property float $county_use_tax
 * @property float $county_local_use_tax
 * @property float $combo_use_tax
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 */
class ZipSalesTaxLookup extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'zip_sales_tax_lookup';

    /**
     * @var array
     */
    protected $fillable = ['county_fips', 'county_default', 'general_default', 'inside_city', 'geo_code', 'state_sales_tax', 'city_sales_tax', 'city_local_sales_tax', 'county_sales_tax', 'county_local_sales_tax', 'combo_sales_tax', 'state_use_tax', 'city_use_tax', 'city_local_use_tax', 'county_use_tax', 'county_local_use_tax', 'combo_use_tax', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];
}
