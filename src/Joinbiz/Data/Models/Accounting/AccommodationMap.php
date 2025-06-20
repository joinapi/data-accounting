<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;
use Joinbiz\Data\Models\Workeffort\WorkEffort;

/**
 * @property string $accommodation_map_id
 * @property string $accommodation_class_id
 * @property string $fixed_asset_id
 * @property string $accommodation_map_type_id
 * @property float $number_of_spaces
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property AccommodationClass $accommodationClass
 * @property FixedAsset $fixedAsset
 * @property AccommodationMapType $accommodationMapType
 * @property WorkEffort[] $workEfforts
 */
class AccommodationMap extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accommodation_map';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'accommodation_map_id';

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
    protected $fillable = ['accommodation_class_id', 'fixed_asset_id', 'accommodation_map_type_id', 'number_of_spaces', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accommodationClass()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\AccommodationClass', 'accommodation_class_id', 'accommodation_class_id');
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
    public function accommodationMapType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\AccommodationMapType', 'accommodation_map_type_id', 'accommodation_map_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEfforts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Workeffort\WorkEffort', 'accommodation_map_id', 'accommodation_map_id');
    }
}
