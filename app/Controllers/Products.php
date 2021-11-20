<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use App\Models\SubcategoryModel;

class Products extends BaseController
{
    public function index()
    {
        $subcategories = new SubcategoryModel();
        $categories = new CategoryModel();
        $products = new ProductsModel();

        $data['subcategories'] = $subcategories->findAll();
        $data['categories'] = $categories->findAll();
        $data['products'] = $products->findAll();

        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/products', $data);
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function store(): bool|string {
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
            $model = new ProductsModel();

            $newData = [
                'product_name'        => $this->request->getVar('prod_name'),
                'product_description' => $this->request->getVar('prod_description'),
                'product_image'       => $imageName,
                'unit_price'          => $this->request->getVar('unit_price'),
                'available_quantity'  => $this->request->getVar('stock'),
            ];

            $model->save($newData);
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

    public function edit($id)
    {
        $products = new ProductsModel();
        $data['products'] = $products->find($id);
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/edit',$data);
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function update($id)
    {
        $products = new ProductsModel();
        $data = [
            'product_name'=>$this->request->getVar('prod_name'),
        ];
        $products->update($id,$data);
        return redirect()->to(base_url('products'))->with('status','Product Data Updated Successfully');
    }

    public function delete($id){
        $products = new ProductsModel();
        $products->delete($id);
        return redirect()->to(base_url('products'))->with('status','Product Data Deleted Successfully');
    }

    public function getSubcategory($id=null){
        $data=[];
        $subcat = new SubcategoryModel();
        $subcategories=json_decode(json_encode($subcat->getWhere(['category'=>$id])->getResult()),true);
        foreach($subcategories as $result){
            $data[]=array(
                'id'=>$result['subcategory_id'],
                'name'=>$result['subcategory_name'],
                'category'=>$result['category']
            );
        }
        $response['subcategories']=$data;
        return $this->response->setJSON($response);
    }
}
