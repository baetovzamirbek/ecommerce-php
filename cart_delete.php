<?php

include 'includes/conn.php';

$id = $_POST['id'];

try {
  $stmt = $pdo->prepare("DELETE FROM cart1 WHERE product_id= :id", ['id' => $id]);
} catch (PDOException $e) {
  $output['cartmessage'] = $e->getMessage();
}
$pdo->close();
$output['cartmessage'] = 'Deleted';

echo json_encode($output);
