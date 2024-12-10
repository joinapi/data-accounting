<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_method_id
 * @property string $payment_method_type_id
 * @property string $party_id
 * @property string $gl_account_id
 * @property string $fin_account_id
 * @property string $description
 * @property string $from_date
 * @property string $thru_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PayPalPaymentMethod $payPalPaymentMethod
 * @property Payment[] $payments
 * @property PaymentGatewayResponse[] $paymentGatewayResponses
 * @property OrderPaymentPreference[] $orderPaymentPreferences
 * @property EftAccount $eftAccount
 * @property GiftCard $giftCard
 * @property CheckAccount $checkAccount
 * @property CreditCard $creditCard
 * @property FinAccount[] $finAccountsByReplenishPaymentId
 * @property PartyAcctgPreference[] $partyAcctgPreferencesByRefundPaymentMethodId
 * @property FinAccount $finAccount
 * @property GlAccount $glAccount
 * @property Party $party
 * @property PaymentMethodType $paymentMethodType
 * @property ShoppingList[] $shoppingLists
 * @property ReturnHeader[] $returnHeaders
 */
class PaymentMethod extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_method';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_method_id';

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
    protected $fillable = ['payment_method_type_id', 'party_id', 'gl_account_id', 'fin_account_id', 'description', 'from_date', 'thru_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payPalPaymentMethod()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\PayPalPaymentMethod', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Payment', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentGatewayResponses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentGatewayResponse', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPaymentPreferences()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\OrderPaymentPreference', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function eftAccount()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\EftAccount', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function giftCard()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\GiftCard', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function checkAccount()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\CheckAccount', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function creditCard()
    {
        return $this->hasOne('Joinbiz\Data\Models\Accounting\CreditCard', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountsByReplenishPaymentId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccount', 'replenish_payment_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyAcctgPreferencesByRefundPaymentMethodId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyAcctgPreference', 'refund_payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccount', 'fin_account_id', 'fin_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'gl_account_id', 'gl_account_id');
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
    public function paymentMethodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethodType', 'payment_method_type_id', 'payment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingLists()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ShoppingList', 'payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnHeaders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ReturnHeader', 'payment_method_id', 'payment_method_id');
    }
}
