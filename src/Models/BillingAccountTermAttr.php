<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $billing_account_term_id
 * @property string $attr_name
 * @property string $attr_value
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property BillingAccountTerm $billingAccountTerm
 */
class BillingAccountTermAttr extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billing_account_term_attr';

    /**
     * @var array
     */
    protected $fillable = ['attr_value', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingAccountTerm()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BillingAccountTerm', 'billing_account_term_id', 'billing_account_term_id');
    }
}
