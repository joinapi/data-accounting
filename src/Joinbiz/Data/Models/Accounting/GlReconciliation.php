<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_reconciliation_id
 * @property string $gl_account_id
 * @property string $status_id
 * @property string $organization_party_id
 * @property string $gl_reconciliation_name
 * @property string $description
 * @property string $created_date
 * @property string $created_by_user_login
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property float $reconciled_balance
 * @property float $opening_balance
 * @property string $reconciled_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlAccount $glAccount
 * @property Party $partyByOrganizationPartyId
 * @property StatusItem $statusItem
 * @property GlReconciliationEntry[] $glReconciliationEntries
 * @property FinAccountTrans[] $finAccountTrans
 */
class GlReconciliation extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gl_reconciliation';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'gl_reconciliation_id';

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
    protected $fillable = ['gl_account_id', 'status_id', 'organization_party_id', 'gl_reconciliation_name', 'description', 'created_date', 'created_by_user_login', 'last_modified_date', 'last_modified_by_user_login', 'reconciled_balance', 'opening_balance', 'reconciled_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function partyByOrganizationPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'organization_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glReconciliationEntries()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlReconciliationEntry', 'gl_reconciliation_id', 'gl_reconciliation_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finAccountTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\FinAccountTrans', 'gl_reconciliation_id', 'gl_reconciliation_id');
    }
}
