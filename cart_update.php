<?php

include 'includes/conn.php';

$id = $_POST['id'];
$quantity = $_POST['quantity'];
if ($quantity > 0) {
  try {
    $stmt = $pdo->prepare("UPDATE cart1 SET quantity= :quantity WHERE product_id=:id", ['quantity' => $quantity, 'id' => $id]);
  } catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
  }
}

echo json_encode($output);
