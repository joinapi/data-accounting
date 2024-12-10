<?php

namespace Joinbiz\Data\Models\Accounting;

use Joinbiz\Data\Models\Party\Party;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_journal_id
 * @property string $organization_party_id
 * @property string $gl_journal_name
 * @property string $is_posted
 * @property string $posted_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Party $partyByOrganizationPartyId
 * @property AcctgTrans[] $acctgTrans
 * @property PartyAcctgPreference[] $partyAcctgPreferencesByErrorGlJournalId
 */
class GlJournal extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_journal';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'gl_journal_id';

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
    protected $fillable = ['organization_party_id', 'gl_journal_name', 'is_posted', 'posted_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByOrganizationPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Party', 'organization_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\AcctgTrans', 'gl_journal_id', 'gl_journal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyAcctgPreferencesByErrorGlJournalId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyAcctgPreference', 'error_gl_journal_id', 'gl_journal_id');
    }
}
