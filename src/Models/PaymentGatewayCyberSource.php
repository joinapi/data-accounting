<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_config_id
 * @property string $merchant_id
 * @property string $api_version
 * @property string $production
 * @property string $keys_dir
 * @property string $keys_file
 * @property string $log_enabled
 * @property string $log_dir
 * @property string $log_file
 * @property float $log_size
 * @property string $merchant_descr
 * @property string $merchant_contact
 * @property string $auto_bill
 * @property string $enable_dav
 * @property string $fraud_score
 * @property string $ignore_avs
 * @property string $disable_bill_avs
 * @property string $avs_decline_codes
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayConfig $paymentGatewayConfig
 */
class PaymentGatewayCyberSource extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateway_cyber_source';

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
    protected $fillable = ['merchant_id', 'api_version', 'production', 'keys_dir', 'keys_file', 'log_enabled', 'log_dir', 'log_file', 'log_size', 'merchant_descr', 'merchant_contact', 'auto_bill', 'enable_dav', 'fraud_score', 'ignore_avs', 'disable_bill_avs', 'avs_decline_codes', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayConfig', 'payment_gateway_config_id', 'payment_gateway_config_id');
    }
}
