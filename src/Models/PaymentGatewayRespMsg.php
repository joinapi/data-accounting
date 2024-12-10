<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_resp_msg_id
 * @property string $payment_gateway_response_id
 * @property string $pgr_message
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGatewayResponse $paymentGatewayResponse
 */
class PaymentGatewayRespMsg extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateway_resp_msg';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_gateway_resp_msg_id';

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
    protected $fillable = ['payment_gateway_response_id', 'pgr_message', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayResponse()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayResponse', 'payment_gateway_response_id', 'payment_gateway_response_id');
    }
}
