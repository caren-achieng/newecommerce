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

    public function show($id): ResponseInterface
    {
        $products = (new ProductsModel)->find($id);

        return $this->getResponse($products);
    }
}
