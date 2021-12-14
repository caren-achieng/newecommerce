<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use App\Models\SubcategoryModel;

class Customers extends BaseController
{
    public function index()
    {
        $category = new CategoryModel();
        $subcategory = new SubcategoryModel();
        $data['categories'] = $category->findAll();
        $data['subcategories'] = $subcategory->findAll();
        return view('client/customerproducts', $data);
    }
    public function getProducts($id = NULL){
        $category = new CategoryModel();
        $subcategory = new SubcategoryModel();
        $data['categories'] = $category->findAll();
        $data['subcategories'] = $subcategory->findAll();
        $subcategories = new SubcategoryModel();
        $product_subcategories = json_decode(json_encode($subcategories->getWhere(['category'=>$id])->getResult()), true);
        $x=0;
        foreach($product_subcategories as $product){
            $subcategory_id[$x] = $product['subcategory_id'];
            $x++;
        }
        $products = new ProductsModel();
        $data['products'] = $products->whereIn('subcategory_id', $subcategory_id)->paginate();
        $data['pager'] = $products->pager;
        return view('client/customerproducts', $data);

    }
}

