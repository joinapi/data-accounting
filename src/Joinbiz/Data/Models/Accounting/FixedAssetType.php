<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fixed_asset_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FixedAsset[] $fixedAssets
 * @property FixedAssetType $fixedAssetTypeByParentTypeId
 * @property FixedAssetTypeAttr[] $fixedAssetTypeAttrs
 * @property WorkEffortFixedAssetStd[] $workEffortFixedAssetStds
 */
class FixedAssetType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fixed_asset_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'fixed_asset_type_id';

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
    public function fixedAssets()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAsset', 'fixed_asset_type_id', 'fixed_asset_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAssetTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAssetType', 'parent_type_id', 'fixed_asset_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetTypeAttr', 'fixed_asset_type_id', 'fixed_asset_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEffortFixedAssetStds()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffortFixedAssetStd', 'fixed_asset_type_id', 'fixed_asset_type_id');
    }
}
