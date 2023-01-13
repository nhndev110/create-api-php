<?php


class Product
{
}

$connect = mysqli_connect('localhost', 'root', '1', 'create-api-php');
mysqli_set_charset($connect, 'utf8');

$sql = "SELECT * FROM products";
$products = mysqli_query($connect, $sql);

$list_product = [];
foreach ($products as $product) {
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

$error = mysqli_error($connect);
if (!empty($error)) {
  echo $error;
}

mysqli_close($connect);
