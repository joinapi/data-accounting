<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $accommodation_class_id
 * @property string $parent_class_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property AccommodationMap[] $accommodationMaps
 * @property AccommodationSpot[] $accommodationSpots
 * @property AccommodationClass $accommodationClassByParentClassId
 */
class AccommodationClass extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'accommodation_class';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'accommodation_class_id';

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
    protected $fillable = ['parent_class_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accommodationMaps()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AccommodationMap', 'accommodation_class_id', 'accommodation_class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accommodationSpots()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\AccommodationSpot', 'accommodation_class_id', 'accommodation_class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accommodationClassByParentClassId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\AccommodationClass', 'parent_class_id', 'accommodation_class_id');
    }
}
