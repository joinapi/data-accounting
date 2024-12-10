<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fin_account_trans_id
 * @property string $fin_account_trans_type_id
 * @property string $fin_account_id
 * @property string $party_id
 * @property string $gl_reconciliation_id
 * @property string $payment_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $performed_by_party_id
 * @property string $reason_enum_id
 * @property string $status_id
 * @property string $transaction_date
 * @property string $entry_date
 * @property float $amount
 * @property string $comments
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Enumeration $enumerationByReasonEnumId
 * @property FinAccount $finAccount
 * @property GlReconciliation $glReconciliation
 * @property Party $party
 * @property Party $partyByPerformedByPartyId
 * @property Payment $payment
 * @property StatusItem $statusItem
 * @property FinAccountTransType $finAccountTransType
 * @property FinAccountTransAttribute[] $finAccountTransAttributes
 * @property AcctgTrans[] $acctgTrans
 * @property ReturnItemResponse[] $returnItemResponses
 */
class FinAccountTrans extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fin_account_trans';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'fin_account_trans_id';

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
    protected $fillable = ['fin_account_trans_type_id', 'fin_account_id', 'party_id', 'gl_reconciliation_id', 'payment_id', 'order_id', 'order_item_seq_id', 'performed_by_party_id', 'reason_enum_id', 'status_id', 'transaction_date', 'entry_date', 'amount', 'comments', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByReasonEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'reason_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccount', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glReconciliation()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlReconciliation', 'gl_reconciliation_id', 'gl_reconciliation_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByPerformedByPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Party', 'performed_by_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Payment', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccountTransType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccountTransType', 'fin_account_trans_type_id', 'fin_account_trans_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountTransAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountTransAttribute', 'fin_account_trans_id', 'fin_account_trans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTrans', 'fin_account_trans_id', 'fin_account_trans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemResponses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ReturnItemResponse', 'fin_account_trans_id', 'fin_account_trans_id');
    }
}
