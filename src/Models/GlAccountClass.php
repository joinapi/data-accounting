<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $gl_account_class_id
 * @property string $parent_class_id
 * @property string $description
 * @property string $is_asset_class
 * @property float $sequence_num
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property GlAccountClass $glAccountClassByParentClassId
 * @property GlAccount[] $glAccounts
 */
class GlAccountClass extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gl_account_class';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'gl_account_class_id';

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
    protected $fillable = ['parent_class_id', 'description', 'is_asset_class', 'sequence_num', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountClassByParentClassId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccountClass', 'parent_class_id', 'gl_account_class_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glAccounts()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\GlAccount', 'gl_account_class_id', 'gl_account_class_id');
    }
}
