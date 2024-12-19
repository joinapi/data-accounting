<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $source_id
 * @property string $group_id
 * @property string $client_id
 * @property string $username
 * @property string $pwd
 * @property string $user_alias
 * @property string $effective_alias
 * @property string $process_mode
 * @property string $server_u_r_l
 * @property string $enable_c_v_m
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewayClearCommerce extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_gateway_clear_commerce';

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
    protected $fillable = ['source_id', 'group_id', 'client_id', 'username', 'pwd', 'user_alias', 'effective_alias', 'process_mode', 'server_u_r_l', 'enable_c_v_m', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
