<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_id_from
 * @property string $invoice_item_seq_id_from
 * @property string $invoice_id_to
 * @property string $invoice_item_seq_id_to
 * @property string $invoice_item_assoc_type_id
 * @property string $from_date
 * @property string $thru_date
 * @property string $party_id_from
 * @property string $party_id_to
 * @property float $quantity
 * @property float $amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InvoiceItemAssocType $invoiceItemAssocType
 */
class InvoiceItemAssoc extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_item_assoc';

    /**
     * @var array
     */
    protected $fillable = ['thru_date', 'party_id_from', 'party_id_to', 'quantity', 'amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoiceItemAssocType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceItemAssocType', 'invoice_item_assoc_type_id', 'invoice_item_assoc_type_id');
    }
}
