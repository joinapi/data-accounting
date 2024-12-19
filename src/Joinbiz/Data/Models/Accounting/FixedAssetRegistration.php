<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fixed_asset_id
 * @property string $from_date
 * @property string $gov_agency_party_id
 * @property string $thru_date
 * @property string $registration_date
 * @property string $registration_number
 * @property string $license_number
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FixedAsset $fixedAsset
 * @property Party $partyByGovAgencyPartyId
 */
class FixedAssetRegistration extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fixed_asset_registration';

    /**
     * @var array
     */
    protected $fillable = ['gov_agency_party_id', 'thru_date', 'registration_date', 'registration_number', 'license_number', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function partyByGovAgencyPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'gov_agency_party_id', 'party_id');
    }
}
