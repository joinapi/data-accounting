<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_item_assoc_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InvoiceItemAssocType $invoiceItemAssocTypeByParentTypeId
 * @property InvoiceItemAssoc[] $invoiceItemAssocs
 */
class InvoiceItemAssocType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'invoice_item_assoc_type';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'invoice_item_assoc_type_id';

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
    protected $fillable = ['parent_type_id', 'has_table', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoiceItemAssocTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceItemAssocType', 'parent_type_id', 'invoice_item_assoc_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItemAssocs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceItemAssoc', 'invoice_item_assoc_type_id', 'invoice_item_assoc_type_id');
    }
}
