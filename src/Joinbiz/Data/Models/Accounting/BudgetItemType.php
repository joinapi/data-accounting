<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_item_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlBudgetXref[] $glBudgetXrefs
 * @property BudgetScenarioRule[] $budgetScenarioRules
 * @property BudgetItemTypeAttr[] $budgetItemTypeAttrs
 * @property BudgetItem[] $budgetItems
 * @property BudgetItemType $budgetItemTypeByParentTypeId
 */
class BudgetItemType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'budget_item_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'budget_item_type_id';

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
    protected $fillable = ['parent_type_id', 'has_table', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glBudgetXrefs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlBudgetXref', 'budget_item_type_id', 'budget_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetScenarioRules()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetScenarioRule', 'budget_item_type_id', 'budget_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetItemTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetItemTypeAttr', 'budget_item_type_id', 'budget_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgetItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BudgetItem', 'budget_item_type_id', 'budget_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budgetItemTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BudgetItemType', 'parent_type_id', 'budget_item_type_id');
    }
}
