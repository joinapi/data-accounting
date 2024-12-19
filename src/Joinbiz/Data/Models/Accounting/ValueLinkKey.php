<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $merchant_id
 * @property string $public_key
 * @property string $private_key
 * @property string $exchange_key
 * @property string $working_key
 * @property float $working_key_index
 * @property string $last_working_key
 * @property string $created_date
 * @property string $created_by_terminal
 * @property string $created_by_user_login
 * @property string $last_modified_date
 * @property string $last_modified_by_terminal
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 */
class ValueLinkKey extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'value_link_key';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'merchant_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['public_key', 'private_key', 'exchange_key', 'working_key', 'working_key_index', 'last_working_key', 'created_date', 'created_by_terminal', 'created_by_user_login', 'last_modified_date', 'last_modified_by_terminal', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];
}
