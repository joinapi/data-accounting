<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_id
 * @property string $gl_account_type_id
 * @property string $gl_account_class_id
 * @property string $gl_resource_type_id
 * @property string $gl_xbrl_class_id
 * @property string $parent_gl_account_id
 * @property string $account_code
 * @property string $account_name
 * @property string $description
 * @property string $product_id
 * @property string $external_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentApplication[] $paymentApplicationsByOverrideGlAccountId
 * @property Payment[] $paymentsByOverrideGlAccountId
 * @property FixedAssetTypeGlAccount[] $fixedAssetTypeGlAccountsByAccDepGlAccountId
 * @property FixedAssetTypeGlAccount[] $fixedAssetTypeGlAccountsByAssetGlAccountId
 * @property FixedAssetTypeGlAccount[] $fixedAssetTypeGlAccountsByDepGlAccountId
 * @property FixedAssetTypeGlAccount[] $fixedAssetTypeGlAccountsByLossGlAccountId
 * @property FixedAssetTypeGlAccount[] $fixedAssetTypeGlAccountsByProfitGlAccountId
 * @property GlReconciliation[] $glReconciliations
 * @property PaymentMethodTypeGlAccount[] $paymentMethodTypeGlAccounts
 * @property OrderItem[] $orderItemsByOverrideGlAccountId
 * @property ProductGlAccount[] $productGlAccounts
 * @property ProductCategoryGlAccount[] $productCategoryGlAccounts
 * @property GlAccountCategoryMember[] $glAccountCategoryMembers
 * @property GlAccountGroupMember[] $glAccountGroupMembers
 * @property GlAccountHistory[] $glAccountHistories
 * @property GlAccountRole[] $glAccountRoles
 * @property GlAccountTypeDefault[] $glAccountTypeDefaults
 * @property GlBudgetXref[] $glBudgetXrefs
 * @property InvoiceItem[] $invoiceItemsByOverrideGlAccountId
 * @property InvoiceItemTypeGlAccount[] $invoiceItemTypeGlAccounts
 * @property InvoiceItemType[] $invoiceItemTypesByDefaultGlAccountId
 * @property ReturnAdjustment[] $returnAdjustmentsByOverrideGlAccountId
 * @property OrderAdjustment[] $orderAdjustmentsByOverrideGlAccountId
 * @property FinAccountTypeGlAccount[] $finAccountTypeGlAccounts
 * @property AcctgTransEntry[] $acctgTransEntries
 * @property GlAccountClass $glAccountClass
 * @property GlAccount $glAccountByParentGlAccountId
 * @property GlResourceType $glResourceType
 * @property GlAccountType $glAccountType
 * @property GlXbrlClass $glXbrlClass
 * @property GlAccountOrganization[] $glAccountOrganizations
 * @property QuoteAdjustment[] $quoteAdjustmentsByOverrideGlAccountId
 * @property FinAccount[] $finAccountsByPostToGlAccountId
 * @property PaymentMethodType[] $paymentMethodTypesByDefaultGlAccountId
 * @property PaymentMethod[] $paymentMethods
 * @property PartyGlAccount[] $partyGlAccounts
 * @property TaxAuthorityGlAccount[] $taxAuthorityGlAccounts
 * @property VarianceReasonGlAccount[] $varianceReasonGlAccounts
 */
class GlAccount extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_account';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'gl_account_id';

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
    protected $fillable = ['gl_account_type_id', 'gl_account_class_id', 'gl_resource_type_id', 'gl_xbrl_class_id', 'parent_gl_account_id', 'account_code', 'account_name', 'description', 'product_id', 'external_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentApplicationsByOverrideGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentApplication', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentsByOverrideGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Payment', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetTypeGlAccountsByAccDepGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetTypeGlAccount', 'acc_dep_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetTypeGlAccountsByAssetGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetTypeGlAccount', 'asset_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetTypeGlAccountsByDepGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetTypeGlAccount', 'dep_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetTypeGlAccountsByLossGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetTypeGlAccount', 'loss_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fixedAssetTypeGlAccountsByProfitGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FixedAssetTypeGlAccount', 'profit_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glReconciliations()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlReconciliation', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethodTypeGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentMethodTypeGlAccount', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemsByOverrideGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\OrderItem', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductGlAccount', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productCategoryGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ProductCategoryGlAccount', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountCategoryMembers()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountCategoryMember', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountGroupMembers()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountGroupMember', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountHistories()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountHistory', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountRole', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountTypeDefaults()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountTypeDefault', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glBudgetXrefs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlBudgetXref', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItemsByOverrideGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceItem', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItemTypeGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceItemTypeGlAccount', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItemTypesByDefaultGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceItemType', 'default_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnAdjustmentsByOverrideGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ReturnAdjustment', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustmentsByOverrideGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\OrderAdjustment', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountTypeGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountTypeGlAccount', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTransEntries()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTransEntry', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountClass()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountClass', 'gl_account_class_id', 'gl_account_class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByParentGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'parent_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glResourceType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlResourceType', 'gl_resource_type_id', 'gl_resource_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountType', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glXbrlClass()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlXbrlClass', 'gl_xbrl_class_id', 'gl_xbrl_class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountOrganizations()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountOrganization', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quoteAdjustmentsByOverrideGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\QuoteAdjustment', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountsByPostToGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccount', 'post_to_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethodTypesByDefaultGlAccountId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentMethodType', 'default_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethods()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentMethod', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyGlAccount', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxAuthorityGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\TaxAuthorityGlAccount', 'gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function varianceReasonGlAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\VarianceReasonGlAccount', 'gl_account_id', 'gl_account_id');
    }
}
