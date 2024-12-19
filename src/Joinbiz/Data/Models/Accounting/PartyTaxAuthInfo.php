<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $party_id
 * @property string $tax_auth_geo_id
 * @property string $tax_auth_party_id
 * @property string $from_date
 * @property string $thru_date
 * @property string $party_tax_id
 * @property string $is_exempt
 * @property string $is_nexus
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Party $party
 */
class PartyTaxAuthInfo extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'party_tax_auth_info';

    /**
     * @var array
     */
    protected $fillable = ['thru_date', 'party_tax_id', 'is_exempt', 'is_nexus', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'party_id', 'party_id');
    }
}
