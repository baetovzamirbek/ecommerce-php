<?php include 'includes/conn.php'; ?>

<?php
try {
  $stmt = $pdo->prepare("SELECT * FROM cart1", []);
  $total = 0;

  $stmt2 = $pdo->prepare("SELECT * FROM cart1", []); //check table is empty or not
  $stmt2 = $stmt2->fetchAll();
  if (isset($stmt2[0]['product_id'])) {
    foreach ($stmt as $data) {
      $id = $data['product_id'];
      $stmtproduct = $pdo->prepare("SELECT * FROM products WHERE id= :id", ['id' => $id]);
      $product = $stmtproduct->fetch();
      $subtotal = $data['quantity'] * $product['price'];
      $total = $total + $subtotal;
      $image = 'images/' . $product['photo'];
      echo "<tr>
          <td><span class='input-group-btn'>
            			<button type='button' class='btn btn-default btn-flat delete' data-id='" . $data['product_id'] . "'><i class='fa fa-close red'></i></button>
            	</span></td>
          <td> <img src='" . $image . "' width='40px' height='40px'></td>
          <td>" . $product['name'] . "</td>
          <td>" . $product['price'] . "</td>
          <td class='input-group'>
							<span class='input-group-btn'>
            					<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='" . $data['product_id'] . "'><i class='fa fa-minus'></i></button>
            				</span>
            				<input type='text' class='form-control' value='" . $data['quantity'] . "' id='qty_" . $data['product_id'] . "' size='2'>
				            <span class='input-group-btn'>
				                <button type='button' id='add' class='btn btn-default btn-flat add' data-id='" . $data['product_id'] . "'><i class='fa fa-plus'></i>
				                </button>
                    </span>
                    </td>
          <td>" . $subtotal . "</td>
          </tr>
     ";
    }
    echo "<td colspan='6' align='right'>Total: " . $total . "</td>";
  } else {
    echo "<tr><td colspan='6' align='center'>Shopping cart empty</td></tr>";
  }
} catch (PDOException $e) {
  echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();

?>
<?php include 'includes/scripts.php'; ?>
<script>

</script>