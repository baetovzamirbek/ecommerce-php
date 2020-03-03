  <?php

  include 'includes/conn.php';

  $conn = $pdo->open();

  $id = $_POST['id'];

  $_SESSION["id"] = $id;


  $stmt = $pdo->prepare("SELECT * FROM cart1 WHERE product_id= :id", ['id' => $id]);
  $row = $stmt->fetch();

  if ($row == null) {
    try {
      $stmt = $conn->prepare("INSERT INTO cart1 (product_id, quantity) VALUES (:product_id, :quantity)");
      $stmt->execute(['product_id' => $id, 'quantity' => 1]);
      $output['message'] = 'Item added to cart';
    } catch (PDOException $e) {
      $output['message'] = $e->getMessage();
    }
  } else {
    $output['message'] = "Product already in cart";
  }

  $pdo->close();
  echo json_encode($output);

  ?>