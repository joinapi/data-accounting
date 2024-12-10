<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $business_email
 * @property string $api_user_name
 * @property string $api_password
 * @property string $api_signature
 * @property string $api_environment
 * @property string $notify_url
 * @property string $return_url
 * @property string $cancel_return_url
 * @property string $image_url
 * @property string $confirm_template
 * @property string $redirect_url
 * @property string $confirm_url
 * @property string $shipping_callback_url
 * @property string $require_confirmed_shipping
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewayPayPal extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateway_pay_pal';

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
    protected $fillable = ['business_email', 'api_user_name', 'api_password', 'api_signature', 'api_environment', 'notify_url', 'return_url', 'cancel_return_url', 'image_url', 'confirm_template', 'redirect_url', 'confirm_url', 'shipping_callback_url', 'require_confirmed_shipping', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
