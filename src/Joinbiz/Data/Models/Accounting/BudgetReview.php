<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $budget_id
 * @property string $budget_review_id
 * @property string $party_id
 * @property string $budget_review_result_type_id
 * @property string $review_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Budget $budget
 * @property Party $party
 * @property BudgetReviewResultType $budgetReviewResultType
 */
class BudgetReview extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'budget_review';

    /**
     * @var array
     */
    protected $fillable = ['review_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budgetReviewResultType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BudgetReviewResultType', 'budget_review_result_type_id', 'budget_review_result_type_id');
    }
}
