<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductsModel extends Model{
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['product_name','product_description','product_image','unit_price','available_quantity','subcategory_id','created_at','updated_at','added_by','is_deleted'];
}