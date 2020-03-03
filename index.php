<?php include 'includes/header.php'; ?>
<?php include 'includes/conn.php'; ?>

<body>

  <?php include 'includes/navbar.php'; ?>

  <!-- Main content -->
  <section class="content">
    <div class="container">

      <div class="text-center">
        <h4 class="mb-3">Tablets- Laptops- SmartPhones- PC</h4>
      </div>
      <!--card copy 
        <div class="row">
          <div class="col-4">
            <div class="card mb-5">
              <img class="card-img-top mx-auto" src="images/apple-9-7-ipad-32-gb-gold.jpg" alt="">
              <div class="card-body text-center">
                <h5 class="card-text"><a href="product.php?product=dell-inspiron-15-7000-15-6">Ipad</a></h5>
                <h6 class="card-text">45000 сом</h6>
              </div>
            </div>
          </div>
        </div>
        -->

      <?php
      try {
        $inc = 3;
        $stmt = $pdo->prepare("SELECT * FROM products", []);
        foreach ($stmt as $data) {
          $image = (!empty($data['photo'])) ? 'images/' . $data['photo'] : 'images/noimage.jpg';
          $inc = ($inc == 3) ? 1 : $inc + 1;
          if ($inc == 1) echo "<div class='row'>";
          echo "
	       							<div class='col-4'>
                        <div class='card mb-5'>
                          <img class='card-img-top mx-auto' src='" . $image . "' alt=''>
                          <div class='card-body text-center'>
                            <h5 class='card-text'><a href='product.php?product=" . $data['slug'] . "'>" . $data['name'] . "</a></h5>
                            <h6 class='card-text'>&#36; " . $data['price'] . "</h6>
		       								</div>
	       								</div>
	       							</div>
	       						";
          if ($inc == 3) echo "</div>";
        }
      } catch (PDOException $e) {
        echo "There is some problem in connection: " . $e->getMessage();
      }
      $pdo->close();
      ?>

    </div>
  </section>

</body>