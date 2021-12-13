<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;

class Home extends BaseController
{
    public function index()
    {
        $category = new CategoryModel();
        $subcategory = new SubcategoryModel();
        $data['categories'] = $category->findAll();
        $data['subcategories'] = $subcategory->findAll();
        echo view('client/home',$data);
    }
}

