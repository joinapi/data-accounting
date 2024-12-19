<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $tax_authority_rate_seq_id
 * @property string $tax_auth_geo_id
 * @property string $tax_auth_party_id
 * @property string $tax_authority_rate_type_id
 * @property string $product_store_id
 * @property string $product_category_id
 * @property string $title_transfer_enum_id
 * @property float $min_item_price
 * @property float $min_purchase
 * @property string $tax_shipping
 * @property float $tax_percentage
 * @property string $tax_promotions
 * @property string $from_date
 * @property string $thru_date
 * @property string $description
 * @property string $is_tax_in_shipping_price
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ProductCategory $productCategory
 * @property ProductStore $productStore
 * @property TaxAuthorityRateType $taxAuthorityRateType
 * @property OrderAdjustment[] $orderAdjustments
 * @property InvoiceItem[] $invoiceItems
 * @property ReturnAdjustment[] $returnAdjustments
 */
class TaxAuthorityRateProduct extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tax_authority_rate_product';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'tax_authority_rate_seq_id';

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
    protected $fillable = ['tax_auth_geo_id', 'tax_auth_party_id', 'tax_authority_rate_type_id', 'product_store_id', 'product_category_id', 'title_transfer_enum_id', 'min_item_price', 'min_purchase', 'tax_shipping', 'tax_percentage', 'tax_promotions', 'from_date', 'thru_date', 'description', 'is_tax_in_shipping_price', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProductCategory', 'product_category_id', 'product_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productStore()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProductStore', 'product_store_id', 'product_store_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxAuthorityRateType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\TaxAuthorityRateType', 'tax_authority_rate_type_id', 'tax_authority_rate_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderAdjustments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\OrderAdjustment', 'tax_authority_rate_seq_id', 'tax_authority_rate_seq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoiceItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Accounting\InvoiceItem', 'tax_authority_rate_seq_id', 'tax_authority_rate_seq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnAdjustments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Order\ReturnAdjustment', 'tax_authority_rate_seq_id', 'tax_authority_rate_seq_id');
    }
}
