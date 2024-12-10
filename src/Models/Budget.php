<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_id
 * @property string $budget_type_id
 * @property string $custom_time_period_id
 * @property string $comments
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentBudgetAllocation[] $paymentBudgetAllocations
 * @property BudgetStatus[] $budgetStatuses
 * @property BudgetScenarioApplication[] $budgetScenarioApplications
 * @property BudgetRole[] $budgetRoles
 * @property BudgetRevisionImpact[] $budgetRevisionImpacts
 * @property BudgetRevision[] $budgetRevisions
 * @property BudgetReview[] $budgetReviews
 * @property BudgetItem[] $budgetItems
 * @property BudgetAttribute[] $budgetAttributes
 * @property BudgetType $budgetType
 * @property CustomTimePeriod $customTimePeriod
 */
class Budget extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'budget';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'budget_id';

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
    protected $fillable = ['budget_type_id', 'custom_time_period_id', 'comments', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentBudgetAllocations()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentBudgetAllocation', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetStatus', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetScenarioApplications()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetScenarioApplication', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetRole', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetRevisionImpacts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetRevisionImpact', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetRevisions()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetRevision', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetReviews()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetReview', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetItem', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetAttribute', 'budget_id', 'budget_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budgetType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BudgetType', 'budget_type_id', 'budget_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customTimePeriod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\CustomTimePeriod', 'custom_time_period_id', 'custom_time_period_id');
    }
}
