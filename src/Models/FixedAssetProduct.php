<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fixed_asset_id
 * @property string $product_id
 * @property string $fixed_asset_product_type_id
 * @property string $from_date
 * @property string $quantity_uom_id
 * @property string $thru_date
 * @property string $comments
 * @property float $sequence_num
 * @property float $quantity
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FixedAsset $fixedAsset
 * @property FixedAssetProductType $fixedAssetProductType
 * @property Product $product
 * @property Uom $uomByQuantityUomId
 */
class FixedAssetProduct extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fixed_asset_product';

    /**
     * @var array
     */
    protected $fillable = ['quantity_uom_id', 'thru_date', 'comments', 'sequence_num', 'quantity', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function fixedAssetProductType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAssetProductType', 'fixed_asset_product_type_id', 'fixed_asset_product_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Product', 'product_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByQuantityUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Uom', 'quantity_uom_id', 'uom_id');
    }
}
