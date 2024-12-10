<?php

namespace Joinbiz\Data\Models\Accounting;

use Joinbiz\Data\Models\Party\TermType;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_term_id
 * @property string $term_type_id
 * @property string $invoice_id
 * @property string $invoice_item_seq_id
 * @property float $term_value
 * @property float $term_days
 * @property string $text_value
 * @property string $description
 * @property string $uom_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Invoice $invoice
 * @property TermType $termType
 * @property InvoiceTermAttribute[] $invoiceTermAttributes
 */
class InvoiceTerm extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_term';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'invoice_term_id';

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
    protected $fillable = ['term_type_id', 'invoice_id', 'invoice_item_seq_id', 'term_value', 'term_days', 'text_value', 'description', 'uom_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Invoice', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function termType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\TermType', 'term_type_id', 'term_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceTermAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceTermAttribute', 'invoice_term_id', 'invoice_term_id');
    }
}
