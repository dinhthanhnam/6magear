<?php 
  require_once __DIR__ . '/../../../core/helpers.php';
  $productId;
  $productName;
  $productImage;
  $productPrice;
  if(isset($laptop)) {
    $productId = $laptop->id;
    $productName = $laptop->name;
    $productPrice = $laptop->price;
    $productImage = '/img/products/'.$productId.'.jpg';
  }
?>
<li class="new-product">
  <a href="products/<?= $productId ?>">
    <div class="product-img">
      <img src="<?= asset($productImage) ?>" alt="" />
    </div>
    <div class="product-info">
      <h3><?= $productName ?></h3>
      <p><?= $productPrice ?></p>
    </div>
  </a>
</li>