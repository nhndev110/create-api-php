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
      'status' => 'success',
      'data' => [
        'products' => $list_product
      ],
      'message' => NULL,
    ];

    return $result;
  }

  public function find($id)
  {
    try {
      $product = (new dbConnect())->findId($this->table, $id);

      if (empty($product)) {
        throw new \Exception("INVALID ID");
      }
      
      $response = [
        'status' => 'success',
        'data' => [
          'product' => [
            'id' => $product['id'],
            'name' => $product['name'],
          ],
        ],
        'message' => NULL,
      ];

    } catch (\Exception $e) {
      $response = [
        'status' => 'error',
        'data' => NULL,
        'message' => $e->getMessage(),
      ];
    }

    return $response;
  }

  public function delete($id)
  {
    (new dbConnect())->deleteId($this->table, $id);
  }

  public function store($param)
  {
    if ($_POST['']) {
      
    }
    (new dbConnect())->store($this->table, $param);
  }
}
