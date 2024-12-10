<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_scenario_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property BudgetScenarioRule[] $budgetScenarioRules
 * @property BudgetScenarioApplication[] $budgetScenarioApplications
 */
class BudgetScenario extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'budget_scenario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'budget_scenario_id';

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
    protected $fillable = ['description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetScenarioRules()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetScenarioRule', 'budget_scenario_id', 'budget_scenario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetScenarioApplications()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetScenarioApplication', 'budget_scenario_id', 'budget_scenario_id');
    }
}
