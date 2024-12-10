<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_item_map_key
 * @property string $invoice_type_id
 * @property string $invoice_item_type_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InvoiceType $invoiceType
 * @property InvoiceItemType $invoiceItemType
 */
class InvoiceItemTypeMap extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_item_type_map';

    /**
     * @var array
     */
    protected $fillable = ['invoice_item_type_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function invoiceItemType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceItemType', 'invoice_item_type_id', 'invoice_item_type_id');
    }
}
