<?php include 'includes/header.php'; ?>

<body>

  <?php include 'includes/navbar.php'; ?>




  <!-- Main content -->
  <section class="content-section">
    <div class="container">
      <div class="row">
        <div class="col-9">
          <h1 class="m-4">YOUR CART</h1>
          <table class="table table-bordered">
            <thead>
              <th></th>
              <th>Photo</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
            </thead>
            <tbody id="tbody">
              <?php include 'cart_details.php'; ?>
            </tbody>
          </table>
          <div class="cartout" id="cartout" style="display:none"><span class="cartmessage"></span></div>

        </div>
      </div>
    </div>

  </section>
</body>