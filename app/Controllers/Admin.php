<?php

namespace App\Controllers;
use App\Models\UserModel;
class Admin extends BaseController
{
    public function index()
    {
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/index');
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function register()
    {
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/register');
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function login()
    {
        return view('admin/login');
    }

    public function store()
    {
        $rules = [
            'first_name' => 'required|min_length[3]|max_length[20]',
            'last_name' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'gender' => 'required'
        ];

        if ($this->validate($rules))
        {
            //store user in DB
            $model = new UserModel();

            $newData = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'    => $this->request->getVar('last_name'),
                'email'    => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'gender'    => $this->request->getVar('gender'),
                'role'=> 2
            ];

            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Successful Registration!');
            return redirect()->to('/admin');
        }
        else
        {
            return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        }
    }

    public function clients()
    {
        $clients = new UserModel();
        $data['clients'] = json_decode(json_encode($clients->whereIn('role', [1])->paginate()),true);
        $data['pager'] = $clients->pager;
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/clients', $data);
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function admins()
    {
        $clients = new UserModel();
        $data['clients'] = json_decode(json_encode($clients->whereIn('role', [2])->paginate()),true);
        $data['pager'] = $clients->pager;
        echo view('admin/header');
        echo view('admin/css');
        echo view('admin/navtop');
        echo view('admin/navleft');
        echo view('admin/admins', $data);
        echo view('admin/footer');
        echo view('admin/htmlclose');
    }

    public function edit($id)
    {
        $client = new UserModel();
        $data['client'] = $client->find($id);
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
        $client = new UserModel();
        $data = [
            'first_name'     => $this->request->getVar('first_name'),
            'last_name'    => $this->request->getVar('last_name'),
            'email'    => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'gender'    => $this->request->getVar('gender'),
            'role'=> 1
        ];
        $client->update($id,$data);
        return redirect()->to(base_url('clients'))->with('status','Data Updated Successfully');

    }

    public function delete($id){
        $client = new UserModel();
        $client->delete($id);
        return redirect()->to(base_url('clients'))->with('status','Data Deleted Successfully');
    }
}
