<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_id
 * @property string $budget_item_seq_id
 * @property string $revision_seq_id
 * @property float $revised_amount
 * @property string $add_delete_flag
 * @property string $revision_reason
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Budget $budget
 */
class BudgetRevisionImpact extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'budget_revision_impact';

    /**
     * @var array
     */
    protected $fillable = ['revised_amount', 'add_delete_flag', 'revision_reason', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budget()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Budget', 'budget_id', 'budget_id');
    }
}
