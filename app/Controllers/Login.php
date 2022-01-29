<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('client/login');
    }

    public function loginAuth()
    {
        $session = session();

        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['user_id'],
                    'name' => $data['first_name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                $response=[
                    'status'=>true,
                    'role' => $data['role'],
                    'customer_url'=>'/index',
                    'admin_url'=>'/admin'
                ];
                return json_encode($response);

            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                $response=[
                    'status'=>false,
                    'message'=>'Incorrect credentials.'
                ];
                return json_encode($response);
            }

        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            $response=[
                'status'=>false,
                'message'=>'Incorrect credentials.'
            ];
            return json_encode($response);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}