<?php

namespace App\Model\Product;

require_once './models/dbConnect.php';

use App\Model\dbConnect;

use \Exception;

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
        throw new Exception("INVALID ID");
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

    } catch (Exception $e) {
      $response = [
        'status' => 'error',
        'data' => NULL,
        'message' => $e->getMessage(),
      ];
    }

    return $response;
  }

  public function store($cols)
  {
    try {
      if (empty($cols['name'])) {
        throw new Exception('Missing require params');
      }
      
      $res = (new dbConnect())->store($this->table, $cols);

      $response = [
        "status" => "success",
        "data" => $res,
        "message" => NULL,
      ];
    } catch(Exception $e) {
      $response = [
        "status" => "error",
        "data" => NULL,
        "message" => $e->getMessage(),
      ];
    }

    return $response;
  }

  public function update($cols)
  {
    try {
      if (empty($cols['id']) || empty($cols['name'])) {
        throw new Exception('Missing require params');
      }
      
      $res = (new dbConnect())->updateId($this->table, $cols);

      $response = [
        "status" => "success",
        "data" => $res,
        "message" => NULL,
      ];
    } catch(Exception $e) {
      $response = [
        "status" => "error",
        "data" => NULL,
        "message" => $e->getMessage(),
      ];
    }

    return $response;
  }

  public function delete($id)
  {
    (new dbConnect())->deleteId($this->table, $id);
  }

}
