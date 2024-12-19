<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_id
 * @property string $organization_party_id
 * @property string $custom_time_period_id
 * @property float $opening_balance
 * @property float $posted_debits
 * @property float $posted_credits
 * @property float $ending_balance
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property CustomTimePeriod $customTimePeriod
 * @property GlAccount $glAccount
 * @property Party $partyByOrganizationPartyId
 */
class GlAccountHistory extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gl_account_history';

    /**
     * @var array
     */
    protected $fillable = ['opening_balance', 'posted_debits', 'posted_credits', 'ending_balance', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customTimePeriod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\CustomTimePeriod', 'custom_time_period_id', 'custom_time_period_id');
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
    public function partyByOrganizationPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'organization_party_id', 'party_id');
    }
}
