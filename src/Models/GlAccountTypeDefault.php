<?php

namespace Joinbiz\Data\Models\Accounting;

use Joinbiz\Data\Models\Party\Party;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_type_id
 * @property string $organization_party_id
 * @property string $gl_account_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlAccount $glAccount
 * @property GlAccountType $glAccountType
 * @property Party $partyByOrganizationPartyId
 */
class GlAccountTypeDefault extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_account_type_default';

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
    public function glAccountType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountType', 'gl_account_type_id', 'gl_account_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByOrganizationPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Party', 'organization_party_id', 'party_id');
    }
}
