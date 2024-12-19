<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $acctg_trans_id
 * @property string $acctg_trans_entry_seq_id
 * @property string $acctg_trans_entry_type_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $inventory_item_id
 * @property string $gl_account_type_id
 * @property string $gl_account_id
 * @property string $organization_party_id
 * @property string $currency_uom_id
 * @property string $orig_currency_uom_id
 * @property string $reconcile_status_id
 * @property string $settlement_term_id
 * @property string $description
 * @property string $voucher_ref
 * @property string $their_party_id
 * @property string $product_id
 * @property string $their_product_id
 * @property float $amount
 * @property float $orig_amount
 * @property string $debit_credit_flag
 * @property string $due_date
 * @property string $group_id
 * @property string $tax_id
 * @property string $is_summary
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property AcctgTrans $acctgTrans
 * @property AcctgTransEntryType $acctgTransEntryType
 * @property Uom $uomByCurrencyUomId
 * @property GlAccount $glAccount
 * @property GlAccountType $glAccountType
 * @property InventoryItem $inventoryItem
 * @property Uom $uomByOrigCurrencyUomId
 * @property Party $party
 * @property StatusItem $statusItemByReconcileStatusId
 * @property RoleType $roleType
 * @property SettlementTerm $settlementTerm
 */
class AcctgTransEntry extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'acctg_trans_entry';

    /**
     * @var array
     */
    protected $fillable = ['acctg_trans_entry_type_id', 'party_id', 'role_type_id', 'inventory_item_id', 'gl_account_type_id', 'gl_account_id', 'organization_party_id', 'currency_uom_id', 'orig_currency_uom_id', 'reconcile_status_id', 'settlement_term_id', 'description', 'voucher_ref', 'their_party_id', 'product_id', 'their_product_id', 'amount', 'orig_amount', 'debit_credit_flag', 'due_date', 'group_id', 'tax_id', 'is_summary', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acctgTrans()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\AcctgTrans', 'acctg_trans_id', 'acctg_trans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acctgTransEntryType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\AcctgTransEntryType', 'acctg_trans_entry_type_id', 'acctg_trans_entry_type_id');
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
    public function glAccount()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'gl_account_id', 'gl_account_id');
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
    public function inventoryItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\InventoryItem', 'inventory_item_id', 'inventory_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByOrigCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'orig_currency_uom_id', 'uom_id');
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
    public function statusItemByReconcileStatusId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'reconcile_status_id', 'status_id');
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
    public function settlementTerm()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\SettlementTerm', 'settlement_term_id', 'settlement_term_id');
    }
}
