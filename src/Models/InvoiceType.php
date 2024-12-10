<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_type_id
 * @property string $parent_type_id
 * @property string $has_table
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InvoiceItemTypeMap[] $invoiceItemTypeMaps
 * @property InvoiceTypeAttr[] $invoiceTypeAttrs
 * @property PartyPrefDocTypeTpl[] $partyPrefDocTypeTpls
 * @property Invoice[] $invoices
 * @property InvoiceType $invoiceTypeByParentTypeId
 */
class InvoiceType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoice_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'invoice_type_id';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItemTypeMaps()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceItemTypeMap', 'invoice_type_id', 'invoice_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceTypeAttrs()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceTypeAttr', 'invoice_type_id', 'invoice_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partyPrefDocTypeTpls()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\PartyPrefDocTypeTpl', 'invoice_type_id', 'invoice_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\Invoice', 'invoice_type_id', 'invoice_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoiceTypeByParentTypeId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceType', 'parent_type_id', 'invoice_type_id');
    }
}
