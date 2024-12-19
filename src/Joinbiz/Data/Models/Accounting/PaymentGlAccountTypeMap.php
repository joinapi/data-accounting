<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_type_id
 * @property string $organization_party_id
 * @property string $gl_account_type_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlAccountType $glAccountType
 * @property Party $partyByOrganizationPartyId
 * @property PaymentType $paymentType
 */
class PaymentGlAccountTypeMap extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'payment_gl_account_type_map';

    /**
     * @var array
     */
    protected $fillable = ['gl_account_type_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'organization_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentType', 'payment_type_id', 'payment_type_id');
    }
}
