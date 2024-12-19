<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $billing_account_term_id
 * @property string $billing_account_id
 * @property string $term_type_id
 * @property string $uom_id
 * @property float $term_value
 * @property float $term_days
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property BillingAccountTermAttr[] $billingAccountTermAttrs
 * @property BillingAccount $billingAccount
 * @property TermType $termType
 * @property Uom $uom
 */
class BillingAccountTerm extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'billing_account_term';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'billing_account_term_id';

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
    protected $fillable = ['billing_account_id', 'term_type_id', 'uom_id', 'term_value', 'term_days', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingAccountTermAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BillingAccountTermAttr', 'billing_account_term_id', 'billing_account_term_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BillingAccount', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function termType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\TermType', 'term_type_id', 'term_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'uom_id', 'uom_id');
    }
}
