<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_id
 * @property string $payment_type_id
 * @property string $payment_method_type_id
 * @property string $payment_method_id
 * @property string $payment_gateway_response_id
 * @property string $payment_preference_id
 * @property string $party_id_from
 * @property string $party_id_to
 * @property string $role_type_id_to
 * @property string $status_id
 * @property string $currency_uom_id
 * @property string $override_gl_account_id
 * @property string $actual_currency_uom_id
 * @property string $effective_date
 * @property string $payment_ref_num
 * @property float $amount
 * @property string $comments
 * @property string $fin_account_trans_id
 * @property float $actual_currency_amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentApplication[] $paymentApplications
 * @property PaymentApplication[] $paymentApplicationsByToPaymentId
 * @property PaymentAttribute[] $paymentAttributes
 * @property PaymentBudgetAllocation[] $paymentBudgetAllocations
 * @property PaymentContent[] $paymentContents
 * @property AcctgTrans[] $acctgTrans
 * @property PaymentGroupMember[] $paymentGroupMembers
 * @property PerfReview[] $perfReviews
 * @property ReturnItemResponse[] $returnItemResponses
 * @property Deduction[] $deductions
 * @property FinAccountTrans[] $finAccountTrans
 * @property Uom $uomByActualCurrencyUomId
 * @property Uom $uomByCurrencyUomId
 * @property Party $partyByPartyIdFrom
 * @property OrderPaymentPreference $orderPaymentPreferenceByPaymentPreferenceId
 * @property GlAccount $glAccountByOverrideGlAccountId
 * @property PaymentGatewayResponse $paymentGatewayResponse
 * @property PaymentMethod $paymentMethod
 * @property PaymentMethodType $paymentMethodType
 * @property PaymentType $paymentType
 * @property StatusItem $statusItem
 * @property Party $partyByPartyIdTo
 * @property RoleType $roleTypeByRoleTypeIdTo
 */
class Payment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'payment_id';

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
    protected $fillable = ['payment_type_id', 'payment_method_type_id', 'payment_method_id', 'payment_gateway_response_id', 'payment_preference_id', 'party_id_from', 'party_id_to', 'role_type_id_to', 'status_id', 'currency_uom_id', 'override_gl_account_id', 'actual_currency_uom_id', 'effective_date', 'payment_ref_num', 'amount', 'comments', 'fin_account_trans_id', 'actual_currency_amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentApplications()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentApplication', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentApplicationsByToPaymentId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentApplication', 'to_payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentAttribute', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentBudgetAllocations()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentBudgetAllocation', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentContents()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentContent', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTrans', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentGroupMembers()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentGroupMember', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function perfReviews()
    {
        return $this->hasMany('Joinbiz\Data\Models\Humanres\PerfReview', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemResponses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnItemResponse', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deductions()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Deduction', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountTrans', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByActualCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'actual_currency_uom_id', 'uom_id');
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
    public function partyByPartyIdFrom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id_from', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderPaymentPreferenceByPaymentPreferenceId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Order\OrderPaymentPreference', 'payment_preference_id', 'order_payment_preference_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByOverrideGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentGatewayResponse()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentGatewayResponse', 'payment_gateway_response_id', 'payment_gateway_response_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethodType', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentType', 'payment_type_id', 'payment_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByPartyIdTo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id_to', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleTypeByRoleTypeIdTo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\RoleType', 'role_type_id_to', 'role_type_id');
    }
}
