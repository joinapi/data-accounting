<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fixed_asset_id
 * @property string $fixed_asset_type_id
 * @property string $parent_fixed_asset_id
 * @property string $instance_of_product_id
 * @property string $class_enum_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $acquire_order_id
 * @property string $acquire_order_item_seq_id
 * @property string $uom_id
 * @property string $calendar_id
 * @property string $located_at_facility_id
 * @property string $fixed_asset_name
 * @property string $date_acquired
 * @property string $date_last_serviced
 * @property string $date_next_service
 * @property string $expected_end_of_life
 * @property string $actual_end_of_life
 * @property float $production_capacity
 * @property string $serial_number
 * @property string $located_at_location_seq_id
 * @property float $salvage_value
 * @property float $depreciation
 * @property float $purchase_cost
 * @property string $purchase_cost_uom_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FixedAssetProduct[] $fixedAssetProducts
 * @property FixedAssetRegistration[] $fixedAssetRegistrations
 * @property FixedAssetStdCost[] $fixedAssetStdCosts
 * @property InventoryItem[] $inventoryItems
 * @property AccommodationMap[] $accommodationMaps
 * @property TechDataCalendar $techDataCalendar
 * @property Enumeration $enumerationByClassEnumId
 * @property Facility $facilityByLocatedAtFacilityId
 * @property Product $productByInstanceOfProductId
 * @property OrderHeader $orderHeaderByAcquireOrderId
 * @property FixedAsset $fixedAssetByParentFixedAssetId
 * @property Party $party
 * @property RoleType $roleType
 * @property FixedAssetType $fixedAssetType
 * @property Uom $uom
 * @property AccommodationSpot[] $accommodationSpots
 * @property Requirement[] $requirements
 * @property Delivery[] $deliveries
 * @property CostComponent[] $costComponents
 * @property FixedAssetAttribute[] $fixedAssetAttributes
 * @property FixedAssetDepMethod[] $fixedAssetDepMethods
 * @property AcctgTrans[] $acctgTrans
 * @property FixedAssetGeoPoint[] $fixedAssetGeoPoints
 * @property FixedAssetIdent[] $fixedAssetIdents
 * @property PartyFixedAssetAssignment[] $partyFixedAssetAssignments
 * @property FixedAssetMaint[] $fixedAssetMaints
 * @property FixedAssetMaintOrder[] $fixedAssetMaintOrders
 * @property WorkEffortFixedAssetAssign[] $workEffortFixedAssetAssigns
 */
class FixedAsset extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fixed_asset';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'fixed_asset_id';

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
    protected $fillable = ['fixed_asset_type_id', 'parent_fixed_asset_id', 'instance_of_product_id', 'class_enum_id', 'party_id', 'role_type_id', 'acquire_order_id', 'acquire_order_item_seq_id', 'uom_id', 'calendar_id', 'located_at_facility_id', 'fixed_asset_name', 'date_acquired', 'date_last_serviced', 'date_next_service', 'expected_end_of_life', 'actual_end_of_life', 'production_capacity', 'serial_number', 'located_at_location_seq_id', 'salvage_value', 'depreciation', 'purchase_cost', 'purchase_cost_uom_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetProducts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetProduct', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetRegistrations()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetRegistration', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetStdCosts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetStdCost', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventoryItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InventoryItem', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accommodationMaps()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AccommodationMap', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function techDataCalendar()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\TechDataCalendar', 'calendar_id', 'calendar_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByClassEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'class_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByLocatedAtFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Facility', 'located_at_facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productByInstanceOfProductId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Product', 'instance_of_product_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderHeaderByAcquireOrderId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\OrderHeader', 'acquire_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAssetByParentFixedAssetId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAsset', 'parent_fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\RoleType', 'role_type_id', 'role_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAssetType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAssetType', 'fixed_asset_type_id', 'fixed_asset_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Uom', 'uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accommodationSpots()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AccommodationSpot', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirements()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Requirement', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Delivery', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function costComponents()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\CostComponent', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetAttribute', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetDepMethods()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetDepMethod', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTrans', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetGeoPoints()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetGeoPoint', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetIdents()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetIdent', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyFixedAssetAssignments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyFixedAssetAssignment', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetMaints()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetMaint', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetMaintOrders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetMaintOrder', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workEffortFixedAssetAssigns()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\WorkEffortFixedAssetAssign', 'fixed_asset_id', 'fixed_asset_id');
    }
}
