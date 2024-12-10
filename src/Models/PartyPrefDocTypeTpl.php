<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $party_pref_doc_type_tpl_id
 * @property string $party_id
 * @property string $invoice_type_id
 * @property string $order_type_id
 * @property string $quote_type_id
 * @property string $from_date
 * @property string $thru_date
 * @property string $custom_screen_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InvoiceType $invoiceType
 * @property OrderType $orderType
 * @property PartyAcctgPreference $partyAcctgPreference
 * @property Party $party
 * @property QuoteType $quoteType
 */
class PartyPrefDocTypeTpl extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'party_pref_doc_type_tpl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'party_pref_doc_type_tpl_id';

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
    protected $fillable = ['party_id', 'invoice_type_id', 'order_type_id', 'quote_type_id', 'from_date', 'thru_date', 'custom_screen_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoiceType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceType', 'invoice_type_id', 'invoice_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\OrderType', 'order_type_id', 'order_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyAcctgPreference()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PartyAcctgPreference', 'party_id', 'party_id');
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
    public function quoteType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\QuoteType', 'quote_type_id', 'quote_type_id');
    }
}
