<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;

class Subcategories extends BaseController
{
    public function index()
    {
        $subcategories = new SubcategoryModel();
        $categories = new CategoryModel();
        $data['subcategories'] = $subcategories->findAll();
        $data['categories'] = $categories->findAll();
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/subcategories', $data);
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function store()
    {
        $rules = [
            'subcategory_name' => 'required|min_length[1]|max_length[25]'
        ];

        if ($this->validate($rules))
        {
            //store user in DB
            $model = new SubcategoryModel();

            $newData = [
                'subcategory_name'     => $this->request->getVar('subcategory_name'),
                'category'=>$this->request->getVar('category')
            ];

            $model->save($newData);
            $response=[
                'status'=>true,
                'url'=>'/subcategories'
            ];
            return json_encode($response);
        }
        else
        {$firstError=$this->validator->getErrors();
            $response=[
                'status'=>false,
                'message'=>reset($firstError)
            ];
            return json_encode($response);
        }
    }

    public function edit($id)
    {
        $subcategories = new SubcategoryModel();
        $data['subcategories'] = $subcategories->find($id);
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
        $subcategories = new SubcategoryModel();
        $data = [
            'subcategory_name'=>$this->request->getVar('subcategory_name'),
        ];
        $subcategories->update($id,$data);
        return redirect()->to(base_url('subcategories'))->with('status','Subcategory Updated Successfully');
    }

    public function delete($id){
        $subcategories = new SubcategoryModel();
        $subcategories->delete($id);
        return redirect()->to(base_url('subcategories'))->with('status','Subcategory Data Deleted Successfully');
    }
}
