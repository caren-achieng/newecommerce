<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index(): ResponseInterface
    {
        $users = (new UserModel)->findAll();

        return $this->getResponse($users);
    }

    public function show($id): ResponseInterface
    {
        $user = (new UserModel)->find($id);

        return $this->getResponse($user);
    }
}
