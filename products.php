<?php
require_once 'data/products.php';
require_once 'layout_products/header.php';
?>

<div id="content">
  <h1>Tous les produits</h1>

  <div id="products-list">
    <?php foreach ($products as $product) {
      require 'product_item.php';
    } ?>
  </div>
</div>

<?php
require_once 'layout_products/footer.php';
?>