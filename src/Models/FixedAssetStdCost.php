<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fixed_asset_id
 * @property string $fixed_asset_std_cost_type_id
 * @property string $from_date
 * @property string $amount_uom_id
 * @property string $thru_date
 * @property float $amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Uom $uomByAmountUomId
 * @property FixedAsset $fixedAsset
 * @property FixedAssetStdCostType $fixedAssetStdCostType
 */
class FixedAssetStdCost extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fixed_asset_std_cost';

    /**
     * @var array
     */
    protected $fillable = ['amount_uom_id', 'thru_date', 'amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByAmountUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Uom', 'amount_uom_id', 'uom_id');
    }

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
    public function fixedAssetStdCostType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAssetStdCostType', 'fixed_asset_std_cost_type_id', 'fixed_asset_std_cost_type_id');
    }
}
