<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $tax_auth_geo_id
 * @property string $tax_auth_party_id
 * @property string $require_tax_id_for_exemption
 * @property string $tax_id_format_pattern
 * @property string $include_tax_in_price
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Geo $geoByTaxAuthGeoId
 * @property Party $partyByTaxAuthPartyId
 */
class TaxAuthority extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tax_authority';

    /**
     * @var array
     */
    protected $fillable = ['require_tax_id_for_exemption', 'tax_id_format_pattern', 'include_tax_in_price', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geoByTaxAuthGeoId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Geo', 'tax_auth_geo_id', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByTaxAuthPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'tax_auth_party_id', 'party_id');
    }
}
