<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $state_code
 * @property string $city
 * @property string $county
 * @property string $from_date
 * @property string $id_code
 * @property string $taxable
 * @property string $ship_cond
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 */
class ZipSalesRuleLookup extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'zip_sales_rule_lookup';

    /**
     * @var array
     */
    protected $fillable = ['id_code', 'taxable', 'ship_cond', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];
}
