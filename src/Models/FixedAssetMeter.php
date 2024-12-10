<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fixed_asset_id
 * @property string $product_meter_type_id
 * @property string $reading_date
 * @property string $maint_hist_seq_id
 * @property float $meter_value
 * @property string $reading_reason_enum_id
 * @property string $work_effort_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ProductMeterType $productMeterType
 */
class FixedAssetMeter extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fixed_asset_meter';

    /**
     * @var array
     */
    protected $fillable = ['maint_hist_seq_id', 'meter_value', 'reading_reason_enum_id', 'work_effort_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productMeterType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\ProductMeterType', 'product_meter_type_id', 'product_meter_type_id');
    }
}
