<?php

require_once __DIR__ . '/router.php';

require_once './controllers/ProductsController.php';

use App\Controllers\ProductsController;

get('/api/products', function () {
  (new ProductsController())->index();
});

get('/api/products/$id', function ($id) {
  (new ProductsController())->show($id);
});

post('/api/products', function () {
  (new ProductsController())->store();
});

put('/api/products', function () {
  (new ProductsController())->update();
});

delete('/api/products/$id', function ($id) {
  (new ProductsController())->delete($id);
});
