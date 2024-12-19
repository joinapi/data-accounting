<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_scenario_id
 * @property string $budget_item_type_id
 * @property float $amount_change
 * @property float $percentage_change
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property BudgetItemType $budgetItemType
 * @property BudgetScenario $budgetScenario
 */
class BudgetScenarioRule extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'budget_scenario_rule';

    /**
     * @var array
     */
    protected $fillable = ['amount_change', 'percentage_change', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function budgetScenario()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BudgetScenario', 'budget_scenario_id', 'budget_scenario_id');
    }
}
