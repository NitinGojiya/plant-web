
<?php

session_start();
$username=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  </head>
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
}

header {
  background-color: #fff;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  padding: 15px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo {
  font-size: 20px;
  font-weight: bold;
  color: #333;
}

nav {
  display: flex;
  align-items: center;
}

nav a {
  color: #333;
  text-decoration: none;
  margin: 0 10px;
}

section {
  padding: 40px 20px;
}

.heading {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  text-align: center;
}

.cart-container {
  background-color: #fff;
  border-radius: 5px;
  padding: 20px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.cart-table {
  width: 100%;
  border-collapse: collapse;
  </style>
<body>
  <header>
    <div class="logo">
      Your Shop
    </div>
    <nav>
      <a href="#">Home</a>
      <a href="#">Products</a>
      <a href="#">About Us</a>
    </nav>
  </header>

  <section>
    <div class="heading">
      Your Shopping Cart
    </div>

    <div class="cart-container">
      <table class="cart-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'connect.php';

          $select = "select * from cart where username='$username'";
          $total = 0;
          $query1 = mysqli_query($con, $select);

          while ($row = mysqli_fetch_array($query1)) {
            $total = $total + $row['subtotal'];
            ?>
            <tr>
              <td>
                <a href="#"><?php echo $row["name"]; ?></a>
              </td>
              <td>₹<?php echo $row["price"]; ?></td>
              <td>
                <div class="cart-quantity">
                  <button>-</button>
                  <input type="number" value="<?php echo $row["qty"]; ?>" min="1">
                  <button>+</button>
                </div>
              </td>
              <td>₹<?php echo $row["subtotal"]; ?></td>
              <td>
                <a href="#" class="remove-item">Remove</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>

      <div class="cart-summary">
        <p><strong>Total:</strong> ₹<?php echo $total; ?></p>
        <a href="payment2.php" class="checkout-btn">Proceed to Checkout</a>
      </div>
    </div>
  </section>

  <script src="script.js"></script>
</body>

</html>
