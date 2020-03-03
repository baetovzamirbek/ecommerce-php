<?php include 'includes/header.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php

$slug = $_GET['product'];

try {
  $stmt = $pdo->prepare("SELECT * FROM products WHERE slug= :slug", ['slug' => $slug]);
  $product = $stmt->fetch();
} catch (PDOException $e) {
  echo "There is some problem in connection: " . $e->getMessage();
}

?>

<body>

  <?php include 'includes/navbar.php'; ?>

  <!-- Main content -->
  <section class="content-section">
    <div class="container">
      <div class="row mx-auto m-5" style="width: 80%;">
        <div class="col">
          <img class="resize" src="<?php echo (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg'; ?>" alt="">
        </div>
        <div class="col">
          <form id="productForm">
            <h4 class="pb-3"><?php echo $product['name']; ?></h4>
            <h4 class="pb-3">&#36; <?php echo $product['price']; ?></h4>
            <h5>Description:</h5>
            <input type="hidden" value="<?php echo $product['id']; ?>" name="id">
            <span class="pb-3"><?php echo $product['description']; ?></span>
            <button type="submit" class="btn btn-primary" id="addtocart">Add to Cart</button>
            <button type="submit" class="btn btn-secondary" style="display:none" id="incart">Already in Cart</button>
            <p id="demo"></p>
            <div class="callout" id="callout" style="display:none"><span class="message"></span></div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php $pdo->close(); ?>
  <?php include 'includes/scripts.php' ?>
</body>