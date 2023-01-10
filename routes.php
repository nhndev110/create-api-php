<?php

require_once __DIR__ . '/router.php';

require_once './controllers/ProductsController.php';

use App\Controllers\ProductsController;

$product = new ProductsController();

get('/products', function () {
  global $product;
  $product->index();
});
