<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('Partials/nav');
        echo view('index');
        echo view('Partials/footer');
    }
}
