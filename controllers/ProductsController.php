<?php

namespace App\Controllers;

require_once './models/product/ProductModel.php';

use App\Model\Product\ProductModel;

class ProductsController
{
  public function __construct()
  {
    header('Content-type: application/json');
  }

  public function index()
  {
    $result = (new ProductModel())->all();
    echo json_encode($result);
  }

  public function show($id)
  {
    $result = (new ProductModel())->find($id);
    echo json_encode($result);
  }

  public function store()
  {
    (new ProductModel())->store($_POST);
  }

  public function destroy($id)
  {
    (new ProductModel())->delete($id);
  }
}
