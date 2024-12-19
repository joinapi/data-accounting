<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $rate_type_id
 * @property string $rate_currency_uom_id
 * @property string $period_type_id
 * @property string $work_effort_id
 * @property string $party_id
 * @property string $empl_position_type_id
 * @property string $from_date
 * @property string $thru_date
 * @property float $rate_amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property EmplPositionType $emplPositionType
 * @property PeriodType $periodType
 * @property Party $party
 * @property Uom $uomByRateCurrencyUomId
 * @property RateType $rateType
 * @property WorkEffort $workEffort
 */
class RateAmount extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rate_amount';

    /**
     * @var array
     */
    protected $fillable = ['thru_date', 'rate_amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emplPositionType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Humanres\EmplPositionType', 'empl_position_type_id', 'empl_position_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\PeriodType', 'period_type_id', 'period_type_id');
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
    public function uomByRateCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'rate_currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rateType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\RateType', 'rate_type_id', 'rate_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffort()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Workeffort\WorkEffort', 'work_effort_id', 'work_effort_id');
    }
}
