<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fulfillment_id
 * @property string $type_enum_id
 * @property string $party_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $survey_response_id
 * @property string $merchant_id
 * @property string $card_number
 * @property string $pin_number
 * @property float $amount
 * @property string $response_code
 * @property string $reference_num
 * @property string $auth_code
 * @property string $fulfillment_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Enumeration $enumerationByTypeEnumId
 * @property OrderHeader $orderHeader
 * @property Party $party
 * @property SurveyResponse $surveyResponse
 */
class GiftCardFulfillment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gift_card_fulfillment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'fulfillment_id';

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
    protected $fillable = ['type_enum_id', 'party_id', 'order_id', 'order_item_seq_id', 'survey_response_id', 'merchant_id', 'card_number', 'pin_number', 'amount', 'response_code', 'reference_num', 'auth_code', 'fulfillment_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByTypeEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Enumeration', 'type_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeader()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderHeader', 'order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surveyResponse()
    {
        return $this->belongsTo('\SurveyResponse', 'survey_response_id', 'survey_response_id');
    }
}
