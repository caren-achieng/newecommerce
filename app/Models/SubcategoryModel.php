<?php

namespace App\Models;
use CodeIgniter\Model;

class SubcategoryModel extends Model{

    protected $table = 'tbl_subcategories';
    protected $primaryKey = 'subcategory_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['subcategory_name','is_deleted','category'];

}