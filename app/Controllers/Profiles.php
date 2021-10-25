<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Profiles extends Controller
{
    public function index()
    {
        $session = session();
        echo "Hello : ".$session->get('firstname');
    }
}