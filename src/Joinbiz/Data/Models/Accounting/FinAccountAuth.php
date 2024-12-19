<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fin_account_auth_id
 * @property string $fin_account_id
 * @property float $amount
 * @property string $currency_uom_id
 * @property string $authorization_date
 * @property string $from_date
 * @property string $thru_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FinAccount $finAccount
 */
class FinAccountAuth extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fin_account_auth';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'fin_account_auth_id';

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
    protected $fillable = ['fin_account_id', 'amount', 'currency_uom_id', 'authorization_date', 'from_date', 'thru_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccount', 'fin_account_id', 'fin_account_id');
    }
}
