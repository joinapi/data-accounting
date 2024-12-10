<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $tax_authority_rate_type_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property TaxAuthorityRateProduct[] $taxAuthorityRateProducts
 */
class TaxAuthorityRateType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tax_authority_rate_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'tax_authority_rate_type_id';

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
    protected $fillable = ['description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxAuthorityRateProducts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\TaxAuthorityRateProduct', 'tax_authority_rate_type_id', 'tax_authority_rate_type_id');
    }
}
