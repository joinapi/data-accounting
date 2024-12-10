<?php

namespace Joinbiz\Data\Models\Accounting;

use Joinbiz\Data\Models\Party\Party;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $datetime_performed
 * @property float $percentage
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Invoice $invoice
 * @property Party $party
 */
class InvoiceRole extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_role';

    /**
     * @var array
     */
    protected $fillable = ['datetime_performed', 'percentage', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Party', 'party_id', 'party_id');
    }
}
