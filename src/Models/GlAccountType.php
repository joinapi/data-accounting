<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentGlAccountTypeMap[] $paymentGlAccountTypeMaps
 * @property ProductGlAccount[] $productGlAccounts
 * @property ProductCategoryGlAccount[] $productCategoryGlAccounts
 * @property GlAccountTypeDefault[] $glAccountTypeDefaults
 * @property GlAccountType $glAccountTypeByParentTypeId
 * @property CostComponentCalc[] $costComponentCalcsByCostGlAccountTypeId
 * @property CostComponentCalc[] $costComponentCalcsByOffsettingGlAccountTypeId
 * @property AcctgTransEntry[] $acctgTransEntries
 * @property GlAccount[] $glAccounts
 * @property PartyGlAccount[] $partyGlAccounts
 */
class GlAccountType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_account_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'gl_account_type_id';

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
    public function paymentGlAccountTypeMaps()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentGlAccountTypeMap', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductGlAccount', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productCategoryGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductCategoryGlAccount', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountTypeDefaults()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountTypeDefault', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountType', 'parent_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function costComponentCalcsByCostGlAccountTypeId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\CostComponentCalc', 'cost_gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function costComponentCalcsByOffsettingGlAccountTypeId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\CostComponentCalc', 'offsetting_gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTransEntries()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTransEntry', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccount', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyGlAccount', 'gl_account_type_id', 'gl_account_type_id');
    }
}
