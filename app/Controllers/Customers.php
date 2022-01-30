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
        $data['products'] = $products->whereIn('subcategory_id', $subcategory_id)->findAll();
//        $data['pager'] = $products->pager;
        return view('client/customerproducts', $data);

    }

    public function getProduct($id = NULL){
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
        $data['products'] = $products->whereIn('subcategory_id',[$id])->paginate();
        $data['pager'] = $products->pager;
        return view('client/customerproducts',$data);
    }

    public function viewProduct($id = NULL){
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
        $data['product'] = json_decode(json_encode($products->getWhere(['product_id'=>$id])->getResult()), true);
        $data['pager'] = $products->pager;
        return view('client/viewproduct',$data);
    }

    public function addToCart(){
        $data = array(
            'id'=>$this->request->getVar('productid'),
            'qty'=>1,
            'price'=>$this->request->getVar('productprice'),
            'name'=>$this->request->getVar('productname'),
            'options'=>array('img'=>$this->request->getVar('productimage'), 'description'=>$this->request->getVar('productdescription'))
        );
        $cart = \Config\Services::cart();
        if($cart->insert($data)){
            return 'success';
        }
        else{
            return 'fail';
        }
    }

    public function viewCart(){
        $cart = \Config\Services::cart();
        $category = new CategoryModel();
        $subcategory = new SubcategoryModel();
        $data['categories'] = $category->findAll();
        $data['subcategories'] = $subcategory->findAll();
        $subcategories = new SubcategoryModel();
        $data['orders'] = $cart->contents();
        return view('client/cart', $data);
    }

    public function changeQuantity($id = null)
    {
        $cart = \Config\Services::cart();
        $cart->update(array(
            'rowid' => $id,
            'qty' => $this->request->getVar('quantity')
        ));
        return "success";
    }

    public function deleteItem($rowid=null){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->back();
    }

    public function viewSummary(){
        $cart = \Config\Services::cart();
        $category = new CategoryModel();
        $subcategory = new SubcategoryModel();
        $data['categories'] = $category->findAll();
        $data['subcategories'] = $subcategory->findAll();
        $subcategories = new SubcategoryModel();
        $data['orders'] = $cart->contents();
        return view('client/summary', $data);
    }

}

