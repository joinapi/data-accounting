<?php

namespace Joinbiz\Data\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_id
 * @property string $invoice_item_seq_id
 * @property string $invoice_item_type_id
 * @property string $override_gl_account_id
 * @property string $override_org_party_id
 * @property string $inventory_item_id
 * @property string $product_id
 * @property string $product_feature_id
 * @property string $parent_invoice_id
 * @property string $parent_invoice_item_seq_id
 * @property string $uom_id
 * @property string $tax_auth_party_id
 * @property string $tax_auth_geo_id
 * @property string $tax_authority_rate_seq_id
 * @property string $sales_opportunity_id
 * @property string $taxable_flag
 * @property float $quantity
 * @property float $amount
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Invoice $invoice
 * @property InventoryItem $inventoryItem
 * @property GlAccount $glAccountByOverrideGlAccountId
 * @property Party $partyByOverrideOrgPartyId
 * @property ProductFeature $productFeature
 * @property Product $product
 * @property SalesOpportunity $salesOpportunity
 * @property Geo $geoByTaxAuthGeoId
 * @property Party $partyByTaxAuthPartyId
 * @property Uom $uom
 * @property TaxAuthorityRateProduct $taxAuthorityRateProduct
 * @property InvoiceItemType $invoiceItemType
 */
class InvoiceItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'invoice_item';

    /**
     * @var array
     */
    protected $fillable = ['invoice_item_type_id', 'override_gl_account_id', 'override_org_party_id', 'inventory_item_id', 'product_id', 'product_feature_id', 'parent_invoice_id', 'parent_invoice_item_seq_id', 'uom_id', 'tax_auth_party_id', 'tax_auth_geo_id', 'tax_authority_rate_seq_id', 'sales_opportunity_id', 'taxable_flag', 'quantity', 'amount', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\Invoice', 'invoice_id', 'invoice_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\InventoryItem', 'inventory_item_id', 'inventory_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function glAccountByOverrideGlAccountId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\GlAccount', 'override_gl_account_id', 'gl_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByOverrideOrgPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'override_org_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productFeature()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\ProductFeature', 'product_feature_id', 'product_feature_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Product\Product', 'product_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salesOpportunity()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Marketing\SalesOpportunity', 'sales_opportunity_id', 'sales_opportunity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geoByTaxAuthGeoId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Geo', 'tax_auth_geo_id', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByTaxAuthPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Party\Party', 'tax_auth_party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Common\Uom', 'uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxAuthorityRateProduct()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\TaxAuthorityRateProduct', 'tax_authority_rate_seq_id', 'tax_authority_rate_seq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoiceItemType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Accounting\InvoiceItemType', 'invoice_item_type_id', 'invoice_item_type_id');
    }
}
