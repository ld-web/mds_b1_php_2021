<div class="product-item">
  <div class="image">
    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
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
</div>