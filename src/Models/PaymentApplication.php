<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_application_id
 * @property string $payment_id
 * @property string $invoice_id
 * @property string $billing_account_id
 * @property string $override_gl_account_id
 * @property string $to_payment_id
 * @property string $tax_auth_geo_id
 * @property string $invoice_item_seq_id
 * @property float $amount_applied
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property BillingAccount $billingAccount
 * @property Geo $geoByTaxAuthGeoId
 * @property Invoice $invoice
 * @property GlAccount $glAccountByOverrideGlAccountId
 * @property Payment $payment
 * @property Payment $paymentByToPaymentId
 */
class PaymentApplication extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_application';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_application_id';

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
    protected $fillable = ['payment_id', 'invoice_id', 'billing_account_id', 'override_gl_account_id', 'to_payment_id', 'tax_auth_geo_id', 'invoice_item_seq_id', 'amount_applied', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function geoByTaxAuthGeoId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Geo', 'tax_auth_geo_id', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Invoice', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByOverrideGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Payment', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentByToPaymentId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Payment', 'to_payment_id', 'payment_id');
    }
}
