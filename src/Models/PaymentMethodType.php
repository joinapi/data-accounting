<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_method_type_id
 * @property string $default_gl_account_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Payment[] $payments
 * @property PaymentGatewayResponse[] $paymentGatewayResponses
 * @property OrderPaymentPreference[] $orderPaymentPreferences
 * @property PaymentMethodTypeGlAccount[] $paymentMethodTypeGlAccounts
 * @property ProductPaymentMethodType[] $productPaymentMethodTypes
 * @property ProductStoreVendorPayment[] $productStoreVendorPayments
 * @property GlAccount $glAccountByDefaultGlAccountId
 * @property PaymentMethod[] $paymentMethods
 * @property ProductStorePaymentSetting[] $productStorePaymentSettings
 */
class PaymentMethodType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_method_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_method_type_id';

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
    protected $fillable = ['default_gl_account_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Payment', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentGatewayResponses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentGatewayResponse', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPaymentPreferences()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\OrderPaymentPreference', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethodTypeGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentMethodTypeGlAccount', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPaymentMethodTypes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductPaymentMethodType', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStoreVendorPayments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductStoreVendorPayment', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByDefaultGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'default_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethods()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentMethod', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStorePaymentSettings()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductStorePaymentSetting', 'payment_method_type_id', 'payment_method_type_id');
    }
}
