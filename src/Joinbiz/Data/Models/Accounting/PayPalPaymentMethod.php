<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_method_id
 * @property string $contact_mech_id
 * @property string $payer_id
 * @property string $express_checkout_token
 * @property string $payer_status
 * @property string $avs_addr
 * @property string $avs_zip
 * @property string $correlation_id
 * @property string $transaction_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ContactMech $contactMech
 * @property PostalAddress $postalAddress
 * @property PaymentMethod $paymentMethod
 */
class PayPalPaymentMethod extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pay_pal_payment_method';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'payment_method_id';

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
    protected $fillable = ['contact_mech_id', 'payer_id', 'express_checkout_token', 'payer_status', 'avs_addr', 'avs_zip', 'correlation_id', 'transaction_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMech()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\ContactMech', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postalAddress()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\PostalAddress', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'payment_method_id', 'payment_method_id');
    }
}
