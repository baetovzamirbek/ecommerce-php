<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(function() {
    //getCart();
    $(document).on('click', '.delete', function(e) {
      var dataId = $(this).attr("data-id");
      $.ajax({
        type: 'POST',
        url: 'cart_delete.php',
        data: {
          id: dataId,
        },
        dataType: 'json',
        success: function(response) {
          $('#cartout').show();
          $('.cartmessage').html(response.cartmessage);
          location.reload();
        }
      });
    });

    $(document).on('click', '.add', function(e) {
      var id = $(this).data('id');
      var quantity = $('#qty_' + id).val();
      quantity++;
      $.ajax({
        type: 'POST',
        url: 'cart_update.php',
        data: {
          id: id,
          quantity: quantity,
        },
        success: function(response) {
          location.reload();
        }
      });
      return false;
    });

    $(document).on('click', '.minus', function(e) {
      var id = $(this).data('id');
      var quantity = $('#qty_' + id).val();
      quantity--;
      $.ajax({
        type: 'POST',
        url: 'cart_update.php',
        data: {
          id: id,
          quantity: quantity,
        },
        success: function(response) {
          location.reload();
        }
      });
      return false;
    });




    $('#productForm').submit(function(e) {
      e.preventDefault();
      var product = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: 'cart_add.php',
        data: product,
        dataType: 'json',
        success: function(response) {
          $('#callout').show();
          $('#incart').show();
          $('#addtocart').hide();
          $('.message').html(response.message);
        }
      });
      return false;
    });

  });
</script>