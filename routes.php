<?php

require_once __DIR__ . '/router.php';

require_once './controllers/ProductsController.php';

use App\Controllers\ProductsController;

$product = new ProductsController();

get('/api/products', function () {
  global $product;
  $product->index();
});

get('/api/products/$id', function ($id) {
  global $product;
  $product->show($id);
});

post('/api/products', function () {
  global $product;
  $product->store();
});

delete('/api/products/$id', function ($id) {
  global $product;
  $product->destroy($id);
});