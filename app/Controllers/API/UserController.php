<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\EwalletModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index(): ResponseInterface
    {
        $users = (new EwalletModel)->findAll();

        return $this->getResponse($users);
    }

    public function show($id): ResponseInterface
    {
        $user = (new EwalletModel)->find($id);

        return $this->getResponse($user);
    }
}
