<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $merchant_id
 * @property string $pwd
 * @property string $server_u_r_l
 * @property float $process_timeout
 * @property string $enable_amount_round
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewaySecurePay extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_gateway_secure_pay';

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
    protected $fillable = ['merchant_id', 'pwd', 'server_u_r_l', 'process_timeout', 'enable_amount_round', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
