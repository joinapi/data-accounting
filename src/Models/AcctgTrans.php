<?php

namespace Joinbiz\Data\Models\Accounting;

use Joinbiz\Data\Models\Common\StatusItem;
use Joinbiz\Data\Models\Party\Party;
use Joinbiz\Data\Models\Party\RoleType;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $acctg_trans_id
 * @property string $acctg_trans_type_id
 * @property string $gl_journal_id
 * @property string $gl_fiscal_type_id
 * @property string $group_status_id
 * @property string $fixed_asset_id
 * @property string $inventory_item_id
 * @property string $physical_inventory_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $invoice_id
 * @property string $payment_id
 * @property string $fin_account_trans_id
 * @property string $shipment_id
 * @property string $receipt_id
 * @property string $work_effort_id
 * @property string $description
 * @property string $transaction_date
 * @property string $is_posted
 * @property string $posted_date
 * @property string $scheduled_posting_date
 * @property string $voucher_ref
 * @property string $voucher_date
 * @property string $their_acctg_trans_id
 * @property string $created_date
 * @property string $created_by_user_login
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property AcctgTransEntry[] $acctgTransEntries
 * @property AcctgTransAttribute[] $acctgTransAttributes
 * @property FixedAsset $fixedAsset
 * @property FinAccountTrans $finAccountTrans
 * @property GlFiscalType $glFiscalType
 * @property GlJournal $glJournal
 * @property StatusItem $statusItemByGroupStatusId
 * @property InventoryItem $inventoryItem
 * @property Invoice $invoice
 * @property Party $party
 * @property Payment $payment
 * @property PhysicalInventory $physicalInventory
 * @property RoleType $roleType
 * @property Shipment $shipment
 * @property ShipmentReceipt $shipmentReceipt
 * @property AcctgTransType $acctgTransType
 * @property WorkEffort $workEffort
 */
class AcctgTrans extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acctg_trans';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'acctg_trans_id';

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
    protected $fillable = ['acctg_trans_type_id', 'gl_journal_id', 'gl_fiscal_type_id', 'group_status_id', 'fixed_asset_id', 'inventory_item_id', 'physical_inventory_id', 'party_id', 'role_type_id', 'invoice_id', 'payment_id', 'fin_account_trans_id', 'shipment_id', 'receipt_id', 'work_effort_id', 'description', 'transaction_date', 'is_posted', 'posted_date', 'scheduled_posting_date', 'voucher_ref', 'voucher_date', 'their_acctg_trans_id', 'created_date', 'created_by_user_login', 'last_modified_date', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTransEntries()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTransEntry', 'acctg_trans_id', 'acctg_trans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTransAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTransAttribute', 'acctg_trans_id', 'acctg_trans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAsset()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FixedAsset', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccountTrans()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccountTrans', 'fin_account_trans_id', 'fin_account_trans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glFiscalType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlFiscalType', 'gl_fiscal_type_id', 'gl_fiscal_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glJournal()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlJournal', 'gl_journal_id', 'gl_journal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItemByGroupStatusId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\StatusItem', 'group_status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InventoryItem', 'inventory_item_id', 'inventory_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Invoice', 'invoice_id', 'invoice_id');
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
    public function payment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Payment', 'payment_id', 'payment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function physicalInventory()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PhysicalInventory', 'physical_inventory_id', 'physical_inventory_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\RoleType', 'role_type_id', 'role_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Shipment', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentReceipt()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\ShipmentReceipt', 'receipt_id', 'receipt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acctgTransType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\AcctgTransType', 'acctg_trans_type_id', 'acctg_trans_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffort()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\WorkEffort', 'work_effort_id', 'work_effort_id');
    }
}
