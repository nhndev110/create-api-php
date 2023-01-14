<?php

namespace App\Model\Product;

require_once './models/Connect.php';

use App\Model\Connect;

class ProductModel
{
  public function all(): array
  {
    $connect = new Connect();
    $sql = "SELECT * FROM products";
    $response = $connect->query_result($sql);

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
      'statusText' => 'ok',
    ];

    return $result;
  }

  public function find($id): array
  {
    $connect = mysqli_connect('localhost', 'root', '1', 'create-api-php');
    mysqli_set_charset($connect, 'utf8');

    $sql = "SELECT * FROM products
    WHERE id = '$id'";
    $response = mysqli_query($connect, $sql);
    $product = mysqli_fetch_array($response);

    $product = [
      'id' => $product['id'],
      'name' => $product['name'],
    ];

    return $product;
  }
}
