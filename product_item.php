<?php require_once 'product_functions.php'; ?>

<div class="product-item">
  <div class="image">
    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
  </div>
  <div class="categories">
    <ul>
      <?php foreach ($product['categories'] as $category) { ?>
        <li>
          <?php echo $category; ?>
        </li>
      <?php } ?>
    </ul>
  </div>
  <div class="name">
    <?php echo $product['name']; ?>
    <?php if ($product['promo']) { ?>
      <span class="promo">En promotion</span>
    <?php } ?>
  </div>
  <p>
    <?php echo getPriceTtc($product['price']); ?> €
  </p>
  <p>
    <a href="product.php?id=<?php echo $product['id']; ?>">Voir le produit</a>
  </p>
</div>