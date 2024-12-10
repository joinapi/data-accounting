<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $certs_path
 * @property string $host_address
 * @property float $host_port
 * @property float $timeout
 * @property string $proxy_address
 * @property float $proxy_port
 * @property string $proxy_logon
 * @property string $proxy_password
 * @property string $vendor
 * @property string $user_id
 * @property string $pwd
 * @property string $partner
 * @property string $check_avs
 * @property string $check_cvv2
 * @property string $pre_auth
 * @property string $enable_transmit
 * @property string $log_file_name
 * @property float $logging_level
 * @property float $max_log_file_size
 * @property string $stack_trace_on
 * @property string $redirect_url
 * @property string $return_url
 * @property string $cancel_return_url
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewayPayflowPro extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateway_payflow_pro';

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
    protected $fillable = ['certs_path', 'host_address', 'host_port', 'timeout', 'proxy_address', 'proxy_port', 'proxy_logon', 'proxy_password', 'vendor', 'user_id', 'pwd', 'partner', 'check_avs', 'check_cvv2', 'pre_auth', 'enable_transmit', 'log_file_name', 'logging_level', 'max_log_file_size', 'stack_trace_on', 'redirect_url', 'return_url', 'cancel_return_url', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
