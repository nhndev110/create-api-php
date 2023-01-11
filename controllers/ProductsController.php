<?php

namespace App\Controllers;

class ProductsController
{
  public function index()
  {
    require_once './models/products.php';
    echo json_encode($result);
  }

  public function show($id)
  {
  }
}
