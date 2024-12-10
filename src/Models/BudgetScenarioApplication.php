<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_scenario_applic_id
 * @property string $budget_scenario_id
 * @property string $budget_id
 * @property string $budget_item_seq_id
 * @property float $amount_change
 * @property float $percentage_change
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Budget $budget
 * @property BudgetScenario $budgetScenario
 */
class BudgetScenarioApplication extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'budget_scenario_application';

    /**
     * @var array
     */
    protected $fillable = ['budget_id', 'budget_item_seq_id', 'amount_change', 'percentage_change', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budget()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Budget', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budgetScenario()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BudgetScenario', 'budget_scenario_id', 'budget_scenario_id');
    }
}
