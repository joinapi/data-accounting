<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_gateway_response_id
 * @property string $payment_service_type_enum_id
 * @property string $order_payment_preference_id
 * @property string $payment_method_type_id
 * @property string $payment_method_id
 * @property string $trans_code_enum_id
 * @property string $currency_uom_id
 * @property float $amount
 * @property string $reference_num
 * @property string $alt_reference
 * @property string $sub_reference
 * @property string $gateway_code
 * @property string $gateway_flag
 * @property string $gateway_avs_result
 * @property string $gateway_cv_result
 * @property string $gateway_score_result
 * @property string $gateway_message
 * @property string $transaction_date
 * @property string $result_declined
 * @property string $result_nsf
 * @property string $result_bad_expire
 * @property string $result_bad_card_number
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Payment[] $payments
 * @property Uom $uomByCurrencyUomId
 * @property OrderPaymentPreference $orderPaymentPreference
 * @property PaymentMethod $paymentMethod
 * @property PaymentMethodType $paymentMethodType
 * @property Enumeration $enumerationByPaymentServiceTypeEnumId
 * @property Enumeration $enumerationByTransCodeEnumId
 * @property PaymentGatewayRespMsg[] $paymentGatewayRespMsgs
 */
class PaymentGatewayResponse extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_gateway_response';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_gateway_response_id';

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
    protected $fillable = ['payment_service_type_enum_id', 'order_payment_preference_id', 'payment_method_type_id', 'payment_method_id', 'trans_code_enum_id', 'currency_uom_id', 'amount', 'reference_num', 'alt_reference', 'sub_reference', 'gateway_code', 'gateway_flag', 'gateway_avs_result', 'gateway_cv_result', 'gateway_score_result', 'gateway_message', 'transaction_date', 'result_declined', 'result_nsf', 'result_bad_expire', 'result_bad_card_number', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Payment', 'payment_gateway_response_id', 'payment_gateway_response_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Uom', 'currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderPaymentPreference()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\OrderPaymentPreference', 'order_payment_preference_id', 'order_payment_preference_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethodType', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByPaymentServiceTypeEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'payment_service_type_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByTransCodeEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'trans_code_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentGatewayRespMsgs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentGatewayRespMsg', 'payment_gateway_response_id', 'payment_gateway_response_id');
    }
}
