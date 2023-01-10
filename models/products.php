<?php

$connect = mysqli_connect('localhost', 'root', '1', 'create-api-php');
mysqli_set_charset($connect, 'utf8');

$sql = "SELECT * FROM products";
$result = mysqli_query($connect, $sql);
echo json_encode($result);

$error = mysqli_error($connect);
if (!empty($error)) {
  echo $error;
}
mysqli_close($connect);
