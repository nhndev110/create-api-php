<?php

namespace App\Controllers;

require_once './models/product/ProductModel.php';

use App\Model\Product\ProductModel;

use \Exception;

class ProductsController
{
  public function __construct()
  {
    header('Content-Type: application/json; charset=UTF-8');
  }

  public function index()
  {
    $response = (new ProductModel())->all();
    echo json_encode($response);
  }

  public function show($id)
  {
    $response = (new ProductModel())->find($id);
    echo json_encode($response);
  }

  public function store()
  {
    $response = (new ProductModel())->store($_POST);
    echo json_encode($response);
  }

  public function update()
  {
    $response = (new ProductModel())->update($_POST);
    echo json_encode($response);
  }

  public function delete($id)
  {
    (new ProductModel())->delete($id);
  }
}
