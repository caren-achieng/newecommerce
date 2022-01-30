<?php

namespace App\Controllers;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    public function index()
    {
        $categories = new CategoryModel();
        $data['categories'] = $categories->findAll();
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/categories', $data);
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function store()
    {
        $rules = [
            'category_name' => 'required|min_length[1]|max_length[25]'
        ];

        if ($this->validate($rules))
        {
            //store user in DB
            $model = new CategoryModel();

            $newData = [
                'category_name'     => $this->request->getVar('category_name'),
            ];

            $model->save($newData);
            $response=[
                'status'=>true,
                'url'=>'/categories'
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
        $categories = new CategoryModel();
        $data['categories'] = $categories->find($id);
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/editcat',$data);
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function update($id)
    {
        $categories = new CategoryModel();
        $data = [
            'category_id'=>$id,
            'category_name'=>$this->request->getVar('category'),
        ];
        $categories->save($data);
        $response = [
            'status' => 'success',
            'url'=>'/categories'
        ];
        return json_encode($response);
    }

    public function delete($id){
        $categories = new CategoryModel();
        $categories->delete($id);
        return redirect()->to(base_url('categories'))->with('status','Data Deleted Successfully');
    }
}
