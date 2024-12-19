<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_id
 * @property string $invoice_type_id
 * @property string $party_id_from
 * @property string $party_id
 * @property string $role_type_id
 * @property string $status_id
 * @property string $billing_account_id
 * @property string $contact_mech_id
 * @property string $currency_uom_id
 * @property string $recurrence_info_id
 * @property string $invoice_date
 * @property string $due_date
 * @property string $paid_date
 * @property string $invoice_message
 * @property string $reference_number
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InvoiceItem[] $invoiceItems
 * @property InvoiceNote[] $invoiceNotes
 * @property InvoiceRole[] $invoiceRoles
 * @property InvoiceStatus[] $invoiceStatuses
 * @property InvoiceTerm[] $invoiceTerms
 * @property InvoiceAttribute[] $invoiceAttributes
 * @property InvoiceContactMech[] $invoiceContactMeches
 * @property PaymentApplication[] $paymentApplications
 * @property AcctgTrans[] $acctgTrans
 * @property InvoiceContent[] $invoiceContents
 * @property BillingAccount $billingAccount
 * @property ContactMech $contactMech
 * @property Uom $uomByCurrencyUomId
 * @property InvoiceType $invoiceType
 * @property Party $party
 * @property Party $partyByPartyIdFrom
 * @property RecurrenceInfo $recurrenceInfo
 * @property RoleType $roleType
 * @property StatusItem $statusItem
 */
class Invoice extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'invoice';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'invoice_id';

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
    protected $fillable = ['invoice_type_id', 'party_id_from', 'party_id', 'role_type_id', 'status_id', 'billing_account_id', 'contact_mech_id', 'currency_uom_id', 'recurrence_info_id', 'invoice_date', 'due_date', 'paid_date', 'invoice_message', 'reference_number', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceItem', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceNotes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceNote', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceRole', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceStatus', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceTerms()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceTerm', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceAttribute', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceContactMeches()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceContactMech', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentApplications()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PaymentApplication', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTrans', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceContents()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceContent', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billingAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\BillingAccount', 'billing_account_id', 'billing_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMech()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\ContactMech', 'contact_mech_id', 'contact_mech_id');
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
    public function invoiceType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceType', 'invoice_type_id', 'invoice_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
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
    public function recurrenceInfo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Service\RecurrenceInfo', 'recurrence_info_id', 'recurrence_info_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\RoleType', 'role_type_id', 'role_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'status_id', 'status_id');
    }
}
