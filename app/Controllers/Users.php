<?php

namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        return view('register');
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
                'role'=> 1
            ];

            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Successful Registration!');
            return redirect()->to('/login');
        }
        else
        {
            return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
        }
    }
}

