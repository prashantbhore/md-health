<?php

namespace App\Imports;

use App\Models\VendorProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $product = new VendorProduct([
            // 'vendor_id' => Auth::user()->id,
            'vendor_id' => 1, // Adjust as needed
            'product_name' => $row['product_name'],
            'product_category_id' => $row['product_category_id'],
            'product_subcategory_id' => $row['product_subcategory_id'],
            'product_description' => $row['product_description'],
            'product_price' => $row['product_price'],
            'shipping_fee' => $row['shipping_fee'],
            'free_shipping' => !empty($row['free_shipping']) ? 'yes' : 'no',
            'discount_price' => $row['discount_price'],
            'sale_price' => $row['sale_price'],
            'featured' => !empty($row['featured']) ? 'yes' : 'no',
            'created_by' => 1, // Adjust as needed
            //'created_by' => Auth::user()->id,
        ]);

        $product->save();

        // Generate and update the unique ID
        $uniqueId = "MDH" . sprintf('%04d', $product->id);
        $product->update(['product_unique_id' => $uniqueId]);

        return $product;
    }
}