<?php
require_once 'data/products.php';

if (!isset($_GET['id'])) {
  die('ID obligatoire');
}

$id = $_GET['id'];

require_once 'layout_products/header.php';

foreach ($products as $product) {
  if ($product['id'] == $id) {
    echo $product['name'];
  }
}

require_once 'layout_products/footer.php';
