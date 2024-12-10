<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_type_id
 * @property string $attr_name
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InvoiceType $invoiceType
 */
class InvoiceTypeAttr extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_type_attr';

    /**
     * @var array
     */
    protected $fillable = ['description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoiceType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceType', 'invoice_type_id', 'invoice_type_id');
    }
}
