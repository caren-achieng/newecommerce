<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model{
    protected $table = 'tbl_categories';
    protected $primaryKey = 'category_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['category_name'];
}