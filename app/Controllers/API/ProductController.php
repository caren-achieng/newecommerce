<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    public function index(): ResponseInterface
    {
        $products = (new ProductsModel)->findAll();

        return $this->getResponse($products);
    }
}
