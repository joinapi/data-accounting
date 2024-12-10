<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $party_id
 * @property string $tax_form_id
 * @property string $cogs_method_id
 * @property string $base_currency_uom_id
 * @property string $invoice_seq_cust_meth_id
 * @property string $quote_seq_cust_meth_id
 * @property string $order_seq_cust_meth_id
 * @property string $refund_payment_method_id
 * @property string $error_gl_journal_id
 * @property string $invoice_sequence_enum_id
 * @property string $order_sequence_enum_id
 * @property string $quote_sequence_enum_id
 * @property float $fiscal_year_start_month
 * @property float $fiscal_year_start_day
 * @property string $invoice_id_prefix
 * @property float $last_invoice_number
 * @property string $last_invoice_restart_date
 * @property string $use_invoice_id_for_returns
 * @property string $quote_id_prefix
 * @property float $last_quote_number
 * @property string $order_id_prefix
 * @property float $last_order_number
 * @property string $enable_accounting
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Uom $uomByBaseCurrencyUomId
 * @property Party $party
 * @property Enumeration $enumerationByCogsMethodId
 * @property GlJournal $glJournalByErrorGlJournalId
 * @property CustomMethod $customMethodByInvoiceSeqCustMethId
 * @property Enumeration $enumerationByInvoiceSequenceEnumId
 * @property CustomMethod $customMethodByOrderSeqCustMethId
 * @property Enumeration $enumerationByOrderSequenceEnumId
 * @property PaymentMethod $paymentMethodByRefundPaymentMethodId
 * @property CustomMethod $customMethodByQuoteSeqCustMethId
 * @property Enumeration $enumerationByQuoteSequenceEnumId
 * @property Enumeration $enumerationByTaxFormId
 * @property PartyPrefDocTypeTpl[] $partyPrefDocTypeTpls
 */
class PartyAcctgPreference extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'party_acctg_preference';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'party_id';

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
    protected $fillable = ['tax_form_id', 'cogs_method_id', 'base_currency_uom_id', 'invoice_seq_cust_meth_id', 'quote_seq_cust_meth_id', 'order_seq_cust_meth_id', 'refund_payment_method_id', 'error_gl_journal_id', 'invoice_sequence_enum_id', 'order_sequence_enum_id', 'quote_sequence_enum_id', 'fiscal_year_start_month', 'fiscal_year_start_day', 'invoice_id_prefix', 'last_invoice_number', 'last_invoice_restart_date', 'use_invoice_id_for_returns', 'quote_id_prefix', 'last_quote_number', 'order_id_prefix', 'last_order_number', 'enable_accounting', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByBaseCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Uom', 'base_currency_uom_id', 'uom_id');
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
    public function enumerationByCogsMethodId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'cogs_method_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glJournalByErrorGlJournalId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlJournal', 'error_gl_journal_id', 'gl_journal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customMethodByInvoiceSeqCustMethId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\CustomMethod', 'invoice_seq_cust_meth_id', 'custom_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByInvoiceSequenceEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'invoice_sequence_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customMethodByOrderSeqCustMethId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\CustomMethod', 'order_seq_cust_meth_id', 'custom_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByOrderSequenceEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'order_sequence_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethodByRefundPaymentMethodId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'refund_payment_method_id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customMethodByQuoteSeqCustMethId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\CustomMethod', 'quote_seq_cust_meth_id', 'custom_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByQuoteSequenceEnumId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'quote_sequence_enum_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enumerationByTaxFormId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Enumeration', 'tax_form_id', 'enum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyPrefDocTypeTpls()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyPrefDocTypeTpl', 'party_id', 'party_id');
    }
}
