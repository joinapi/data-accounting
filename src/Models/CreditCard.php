<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $payment_method_id
 * @property string $contact_mech_id
 * @property string $card_type
 * @property string $card_number
 * @property string $valid_from_date
 * @property string $expire_date
 * @property string $issue_number
 * @property string $company_name_on_card
 * @property string $title_on_card
 * @property string $first_name_on_card
 * @property string $middle_name_on_card
 * @property string $last_name_on_card
 * @property string $suffix_on_card
 * @property float $consecutive_failed_auths
 * @property string $last_failed_auth_date
 * @property float $consecutive_failed_nsf
 * @property string $last_failed_nsf_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ContactMech $contactMech
 * @property PostalAddress $postalAddress
 * @property PaymentMethod $paymentMethod
 */
class CreditCard extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'credit_card';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'payment_method_id';

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
    protected $fillable = ['contact_mech_id', 'card_type', 'card_number', 'valid_from_date', 'expire_date', 'issue_number', 'company_name_on_card', 'title_on_card', 'first_name_on_card', 'middle_name_on_card', 'last_name_on_card', 'suffix_on_card', 'consecutive_failed_auths', 'last_failed_auth_date', 'consecutive_failed_nsf', 'last_failed_nsf_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMech()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\ContactMech', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postalAddress()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PostalAddress', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\PaymentMethod', 'payment_method_id', 'payment_method_id');
    }
}
