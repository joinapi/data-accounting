<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $billing_account_id
 * @property string $account_currency_uom_id
 * @property string $contact_mech_id
 * @property float $account_limit
 * @property string $from_date
 * @property string $thru_date
 * @property string $description
 * @property string $external_account_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PaymentApplication[] $paymentApplications
 * @property OrderHeader[] $orderHeaders
 * @property BillingAccountTerm[] $billingAccountTerms
 * @property BillingAccountRole[] $billingAccountRoles
 * @property ReturnItemResponse[] $returnItemResponses
 * @property ReturnHeader[] $returnHeaders
 * @property ContactMech $contactMech
 * @property Uom $uomByAccountCurrencyUomId
 * @property PostalAddress $postalAddress
 * @property Invoice[] $invoices
 */
class BillingAccount extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billing_account';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'billing_account_id';

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
    protected $fillable = ['account_currency_uom_id', 'contact_mech_id', 'account_limit', 'from_date', 'thru_date', 'description', 'external_account_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentApplications()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentApplication', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderHeaders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\OrderHeader', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingAccountTerms()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BillingAccountTerm', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingAccountRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\BillingAccountRole', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemResponses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ReturnItemResponse', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnHeaders()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\ReturnHeader', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMech()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\ContactMech', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByAccountCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Uom', 'account_currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postalAddress()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PostalAddress', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Invoice', 'billing_account_id', 'billing_account_id');
    }
}
