<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $vendor
 * @property string $production_host
 * @property string $testing_host
 * @property string $sage_pay_mode
 * @property string $protocol_version
 * @property string $authentication_trans_type
 * @property string $authentication_url
 * @property string $authorise_trans_type
 * @property string $authorise_url
 * @property string $release_trans_type
 * @property string $release_url
 * @property string $void_url
 * @property string $refund_url
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewaySagePay extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_gateway_sage_pay';

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
    protected $fillable = ['vendor', 'production_host', 'testing_host', 'sage_pay_mode', 'protocol_version', 'authentication_trans_type', 'authentication_url', 'authorise_trans_type', 'authorise_url', 'release_trans_type', 'release_url', 'void_url', 'refund_url', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
