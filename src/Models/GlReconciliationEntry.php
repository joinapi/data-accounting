<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_reconciliation_id
 * @property string $acctg_trans_id
 * @property string $acctg_trans_entry_seq_id
 * @property float $reconciled_amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlReconciliation $glReconciliation
 */
class GlReconciliationEntry extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_reconciliation_entry';

    /**
     * @var array
     */
    protected $fillable = ['reconciled_amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glReconciliation()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlReconciliation', 'gl_reconciliation_id', 'gl_reconciliation_id');
    }
}
