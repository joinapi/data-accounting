<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $payment_gateway_config_type_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfigType $paymentGatewayConfigType
 * @property PaymentGatewayAuthorizeNet $paymentGatewayAuthorizeNet
 * @property PaymentGatewayClearCommerce $paymentGatewayClearCommerce
 * @property PaymentGatewayCyberSource $paymentGatewayCyberSource
 * @property PaymentGatewayEway $paymentGatewayEway
 * @property PaymentGatewayOrbital $paymentGatewayOrbital
 * @property PaymentGatewayPayPal $paymentGatewayPayPal
 * @property PaymentGatewayPayflowPro $paymentGatewayPayflowPro
 * @property PaymentGatewaySagePay $paymentGatewaySagePay
 * @property PaymentGatewaySecurePay $paymentGatewaySecurePay
 * @property PaymentGatewayWorldPay $paymentGatewayWorldPay
 * @property ProductStorePaymentSetting[] $productStorePaymentSettings
 */
class PaymentGatewayConfig extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateway_config';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_gateway_config_id';

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
    protected $fillable = ['payment_gateway_config_type_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfigType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfigType', 'payment_gateway_config_type_id', 'payment_gateway_config_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayAuthorizeNet()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayAuthorizeNet', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayClearCommerce()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayClearCommerce', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayCyberSource()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayCyberSource', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayEway()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayEway', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayOrbital()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayOrbital', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayPayPal()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayPayPal', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayPayflowPro()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayPayflowPro', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewaySagePay()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewaySagePay', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewaySecurePay()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewaySecurePay', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentGatewayWorldPay()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PaymentGatewayWorldPay', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStorePaymentSettings()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductStorePaymentSetting', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
