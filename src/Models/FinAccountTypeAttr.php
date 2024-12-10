<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fin_account_type_id
 * @property string $attr_name
 * @property string $attr_value
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FinAccountType $finAccountType
 */
class FinAccountTypeAttr extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fin_account_type_attr';

    /**
     * @var array
     */
    protected $fillable = ['attr_value', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finAccountType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\FinAccountType', 'fin_account_type_id', 'fin_account_type_id');
    }
}
