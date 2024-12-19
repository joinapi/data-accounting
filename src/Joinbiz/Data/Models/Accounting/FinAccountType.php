<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fin_account_type_id
 * @property string $parent_type_id
 * @property string $replenish_enum_id
 * @property string $is_refundable
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FinAccountTypeAttr[] $finAccountTypeAttrs
 * @property ProductStoreFinActSetting[] $productStoreFinActSettings
 * @property FinAccountTypeGlAccount[] $finAccountTypeGlAccounts
 * @property FinAccountType $finAccountTypeByParentTypeId
 * @property Enumeration $enumerationByReplenishEnumId
 * @property FinAccount[] $finAccounts
 */
class FinAccountType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fin_account_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'fin_account_type_id';

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
    protected $fillable = ['parent_type_id', 'replenish_enum_id', 'is_refundable', 'has_table', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountTypeAttr', 'fin_account_type_id', 'fin_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStoreFinActSettings()
    {
        return $this->hasMany('Joinbiz\Data\Models\Product\ProductStoreFinActSetting', 'fin_account_type_id', 'fin_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountTypeGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountTypeGlAccount', 'fin_account_type_id', 'fin_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccountTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccountType', 'parent_type_id', 'fin_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByReplenishEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Enumeration', 'replenish_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccount', 'fin_account_type_id', 'fin_account_type_id');
    }
}
