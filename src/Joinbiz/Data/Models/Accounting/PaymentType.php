<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGlAccountTypeMap[] $paymentGlAccountTypeMaps
 * @property PaymentTypeAttr[] $paymentTypeAttrs
 * @property Payment[] $payments
 * @property PaymentType $paymentTypeByParentTypeId
 */
class PaymentType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'payment_type_id';

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
    protected $fillable = ['parent_type_id', 'has_table', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentGlAccountTypeMaps()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentGlAccountTypeMap', 'payment_type_id', 'payment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentTypeAttr', 'payment_type_id', 'payment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Payment', 'payment_type_id', 'payment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentType', 'parent_type_id', 'payment_type_id');
    }
}
