<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property string $invoice_item_type_id
 * @property string $organization_party_id
 * @property string $gl_account_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlAccount $glAccount
 * @property InvoiceItemType $invoiceItemType
 * @property Party $partyByOrganizationPartyId
 */
class InvoiceItemTypeGlAccount extends Pivot
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_item_type_gl_account';

    /**
     * @var array
     */
    protected $fillable = ['gl_account_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function invoiceItemType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceItemType', 'invoice_item_type_id', 'invoice_item_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByOrganizationPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'organization_party_id', 'party_id');
    }
}
