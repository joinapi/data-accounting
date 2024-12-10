<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_group_id
 * @property string $gl_account_group_type_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlAccountGroupType $glAccountGroupType
 * @property GlAccountGroupMember[] $glAccountGroupMembers
 */
class GlAccountGroup extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_account_group';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'gl_account_group_id';

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
    protected $fillable = ['gl_account_group_type_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountGroupType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountGroupType', 'gl_account_group_type_id', 'gl_account_group_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccountGroupMembers()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccountGroupMember', 'gl_account_group_id', 'gl_account_group_id');
    }
}
