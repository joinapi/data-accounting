<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $redirect_url
 * @property string $inst_id
 * @property string $auth_mode
 * @property string $fix_contact
 * @property string $hide_contact
 * @property string $hide_currency
 * @property string $lang_id
 * @property string $no_language_menu
 * @property string $with_delivery
 * @property float $test_mode
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewayWorldPay extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_gateway_world_pay';

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
    protected $fillable = ['redirect_url', 'inst_id', 'auth_mode', 'fix_contact', 'hide_contact', 'hide_currency', 'lang_id', 'no_language_menu', 'with_delivery', 'test_mode', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
