<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';

    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'unit_price',
        'available_quantity',
        'subcategory_id',
        'added_by',
        'is_deleted'
    ];
}
