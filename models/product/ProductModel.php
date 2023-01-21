<?php

namespace App\Model\Product;

require_once './models/dbConnect.php';

use App\Model\dbConnect;

class ProductModel
{
  private string $table;

  public function __construct()
  {
    $this->table = "products";
  }

  public function all()
  {
    $response = (new dbConnect())->selectAll($this->table);
    
    $list_product = [];
    foreach ($response as $product) {
      $list_product[] = [
        "id" => $product['id'],
        "name" => $product['name'],
      ];
    }

    $result = [
      'data' => $list_product,
      'statusCode' => 200,
    ];

    return $result;
  }

  public function find($id)
  {
    $result = (new dbConnect())->findId($this->table, $id);
    $product = [
      'data' => [
        'id' => $result['id'],
        'name' => $result['name'],
      ],
      'statusCode' => 200,
    ];

    return $product;
  }

  public function delete($id)
  {
    (new dbConnect())->deleteId($this->table, $id);
  }

  public function store($param)
  {
    (new dbConnect())->store($this->table, $param);
  }
}
