<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_id
 * @property string $gl_account_group_type_id
 * @property string $gl_account_group_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlAccount $glAccount
 * @property GlAccountGroup $glAccountGroup
 * @property GlAccountGroupType $glAccountGroupType
 */
class GlAccountGroupMember extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_account_group_member';

    /**
     * @var array
     */
    protected $fillable = ['gl_account_group_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function glAccountGroup()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountGroup', 'gl_account_group_id', 'gl_account_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountGroupType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountGroupType', 'gl_account_group_type_id', 'gl_account_group_type_id');
    }
}
