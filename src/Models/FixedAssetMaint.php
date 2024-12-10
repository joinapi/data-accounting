<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fixed_asset_id
 * @property string $maint_hist_seq_id
 * @property string $status_id
 * @property string $product_maint_type_id
 * @property string $schedule_work_effort_id
 * @property string $interval_uom_id
 * @property string $interval_meter_type_id
 * @property string $purchase_order_id
 * @property string $product_maint_seq_id
 * @property float $interval_quantity
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FixedAsset $fixedAsset
 * @property Uom $uomByIntervalUomId
 * @property ProductMeterType $productMeterTypeByIntervalMeterTypeId
 * @property ProductMaintType $productMaintType
 * @property OrderHeader $orderHeaderByPurchaseOrderId
 * @property WorkEffort $workEffortByScheduleWorkEffortId
 * @property StatusItem $statusItem
 */
class FixedAssetMaint extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fixed_asset_maint';

    /**
     * @var array
     */
    protected $fillable = ['status_id', 'product_maint_type_id', 'schedule_work_effort_id', 'interval_uom_id', 'interval_meter_type_id', 'purchase_order_id', 'product_maint_seq_id', 'interval_quantity', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAsset()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAsset', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByIntervalUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Uom', 'interval_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productMeterTypeByIntervalMeterTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\ProductMeterType', 'interval_meter_type_id', 'product_meter_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productMaintType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\ProductMaintType', 'product_maint_type_id', 'product_maint_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeaderByPurchaseOrderId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\OrderHeader', 'purchase_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffortByScheduleWorkEffortId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\WorkEffort', 'schedule_work_effort_id', 'work_effort_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\StatusItem', 'status_id', 'status_id');
    }
}
