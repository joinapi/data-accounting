<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fin_account_id
 * @property string $fin_account_type_id
 * @property string $currency_uom_id
 * @property string $organization_party_id
 * @property string $owner_party_id
 * @property string $post_to_gl_account_id
 * @property string $replenish_payment_id
 * @property string $status_id
 * @property string $fin_account_name
 * @property string $fin_account_code
 * @property string $fin_account_pin
 * @property string $from_date
 * @property string $thru_date
 * @property string $is_refundable
 * @property float $replenish_level
 * @property float $actual_balance
 * @property float $available_balance
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property OrderPaymentPreference[] $orderPaymentPreferences
 * @property FinAccountStatus[] $finAccountStatuses
 * @property FinAccountAttribute[] $finAccountAttributes
 * @property ReturnHeader[] $returnHeaders
 * @property FinAccountAuth[] $finAccountAuths
 * @property Uom $uomByCurrencyUomId
 * @property GlAccount $glAccountByPostToGlAccountId
 * @property Party $partyByOrganizationPartyId
 * @property Party $partyByOwnerPartyId
 * @property PaymentMethod $paymentMethodByReplenishPaymentId
 * @property FinAccountType $finAccountType
 * @property PaymentMethod[] $paymentMethods
 * @property FinAccountRole[] $finAccountRoles
 * @property FinAccountTrans[] $finAccountTrans
 */
class FinAccount extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fin_account';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'fin_account_id';

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
    protected $fillable = ['fin_account_type_id', 'currency_uom_id', 'organization_party_id', 'owner_party_id', 'post_to_gl_account_id', 'replenish_payment_id', 'status_id', 'fin_account_name', 'fin_account_code', 'fin_account_pin', 'from_date', 'thru_date', 'is_refundable', 'replenish_level', 'actual_balance', 'available_balance', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPaymentPreferences()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderPaymentPreference', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountStatus', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountAttribute', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnHeaders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnHeader', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountAuths()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountAuth', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByPostToGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'post_to_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByOrganizationPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'organization_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByOwnerPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'owner_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethodByReplenishPaymentId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'replenish_payment_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccountType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccountType', 'fin_account_type_id', 'fin_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethods()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentMethod', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountRole', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountTrans', 'fin_account_id', 'fin_account_id');
    }
}
