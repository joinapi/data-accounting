<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $tax_auth_geo_id
 * @property string $tax_auth_party_id
 * @property string $to_tax_auth_geo_id
 * @property string $to_tax_auth_party_id
 * @property string $from_date
 * @property string $tax_authority_assoc_type_id
 * @property string $thru_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property TaxAuthorityAssocType $taxAuthorityAssocType
 */
class TaxAuthorityAssoc extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tax_authority_assoc';

    /**
     * @var array
     */
    protected $fillable = ['tax_authority_assoc_type_id', 'thru_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxAuthorityAssocType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\TaxAuthorityAssocType', 'tax_authority_assoc_type_id', 'tax_authority_assoc_type_id');
    }
}
