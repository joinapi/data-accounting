<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_id
 * @property string $budget_item_type_id
 * @property string $from_date
 * @property string $thru_date
 * @property float $allocation_percentage
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property BudgetItemType $budgetItemType
 * @property GlAccount $glAccount
 */
class GlBudgetXref extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gl_budget_xref';

    /**
     * @var array
     */
    protected $fillable = ['thru_date', 'allocation_percentage', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budgetItemType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BudgetItemType', 'budget_item_type_id', 'budget_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'gl_account_id', 'gl_account_id');
    }
}
