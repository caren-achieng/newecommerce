<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\Product;
use App\Models\ProductsModel;
use App\Models\SubcategoryModel;
use Exception;

class ProductController extends BaseController
{
    public function index(): string {
        return view('');
    }

    public function create(): string {
        $data = [
            'categories'    => (new CategoryModel())->findAll(),
            'subcategories' => (new SubcategoryModel())->findAll(),
            'products'      => (new ProductsModel())->findAll(),
        ];

        return view('admin/pages/products/create', $data);
    }

    public function store(): bool|string {
//        dd($this->request->getVar('prod_image'), $this->request->getFile('prod_image'));

        $rules = [
            'prod_name'  => 'required|min_length[1]|max_length[25]',
            'unit_price' => 'required',
            'stock'      => 'required'
        ];

        $file = $this->request->getFile('prod_image');

        if(!$file->isValid()) {
            return json_encode('Please upload a valid image.');
        }

        $imageName = "pic_" . time() . ".{$file->getClientExtension()}";
        $file->move(PUBLICPATH . "/images/products/", $imageName);

        if($this->validate($rules)) {
            //store user in DB

            $newData = [
                'product_name'        => $this->request->getVar('prod_name'),
                'product_description' => $this->request->getVar('prod_description'),
                'product_image'       => $imageName,
                'unit_price'          => $this->request->getVar('unit_price'),
                'available_quantity'  => $this->request->getVar('stock'),
                'subcategory_id'    => $this->request->getVar('subcategory_id'),
                'added_by' => 7
            ];

//            echo "<pre>";  print_r($newData); die;

            try {
                Product::create($newData);
            } catch (Exception $e) {
                echo "<pre>";  print_r($e); die;
            }

            $response = [
                'status' => true,
                'url'    => '/products'
            ];
            return json_encode($response);
        } else {
            $firstError = $this->validator->getErrors();
            $response = [
                'status'  => false,
                'message' => reset($firstError)
            ];
            return json_encode($response);
        }
    }
}
