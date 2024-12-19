<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $transaction_url
 * @property string $certificate_alias
 * @property string $api_version
 * @property string $delimited_data
 * @property string $delimiter_char
 * @property string $cp_version
 * @property string $cp_market_type
 * @property string $cp_device_type
 * @property string $method
 * @property string $email_customer
 * @property string $email_merchant
 * @property string $test_mode
 * @property string $relay_response
 * @property string $tran_key
 * @property string $user_id
 * @property string $pwd
 * @property string $trans_description
 * @property float $duplicate_window
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewayAuthorizeNet extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_gateway_authorize_net';

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
    protected $fillable = ['transaction_url', 'certificate_alias', 'api_version', 'delimited_data', 'delimiter_char', 'cp_version', 'cp_market_type', 'cp_device_type', 'method', 'email_customer', 'email_merchant', 'test_mode', 'relay_response', 'tran_key', 'user_id', 'pwd', 'trans_description', 'duplicate_window', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
