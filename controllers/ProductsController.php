<?php

namespace App\Controllers;

require_once './models/product/ProductModel.php';

use App\Model\Product\ProductModel;

class ProductsController
{
  public function index()
  {
    $result = (new ProductModel())->all();
    header('Content-type: application/json');
    echo json_encode($result);
  }

  public function show($id)
  {
    $result = (new ProductModel())->find($id);
    header('Content-type: application/json');
    echo json_encode($result);
  }

  public function destroy($id)
  {
    header('Content-type: application/json');
    (new ProductModel())->delete($id);
  }
}
