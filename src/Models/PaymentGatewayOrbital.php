<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $username
 * @property string $connection_password
 * @property string $merchant_id
 * @property string $engine_class
 * @property string $host_name
 * @property float $port
 * @property string $host_name_failover
 * @property float $port_failover
 * @property float $connection_timeout_seconds
 * @property float $read_timeout_seconds
 * @property string $authorization_u_r_i
 * @property string $sdk_version
 * @property string $ssl_socket_factory
 * @property string $response_type
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewayOrbital extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateway_orbital';

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
    protected $fillable = ['username', 'connection_password', 'merchant_id', 'engine_class', 'host_name', 'port', 'host_name_failover', 'port_failover', 'connection_timeout_seconds', 'read_timeout_seconds', 'authorization_u_r_i', 'sdk_version', 'ssl_socket_factory', 'response_type', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
