
<?php

session_start();
$username=$_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f7f6;
    margin: 0;
}

.pay {
    background-color: #fff;
    padding: 40px;
    width: 400px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.pay h2 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}


.card_logo {
    text-align: center;
    margin-bottom:20px;
}

.card_logo img {
    max-width: 200%;
    height: auto;
}
.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #666;
    font-weight: bold;
}

.input-group input[type="text"],
.input-group input[type="number"] {
    width: 100%;
    height: 40px;
    padding: 0 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.input-group input[type="submit"] {
    width: 100%;
    height: 40px;
    border: none;
    background-color: #108A4F;
    color: #fff;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.input-group input[type="submit"]:hover {
    background-color: #0e6f3e;
}

.error-message {
    color: #ff0000;
    font-size: 14px;
    margin-top: 5px;
}
    }
    .in{
        width: 300px;
        height: 40px;
    }
</style>
</head>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="pay">
        <h2>Payment Form</h2>
        <div class="card_logo">
            <img src="card_logo" alt="Card Logo">
        </div>
        <form id="paymentForm">
		<div class="input-group">
                <label for="cardname">Card Holder Name</label>
                <input type="text" id="cardname" name="cardname" class="in" required>
            </div>
            <div class="input-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" class="in" required>
            </div>
            <div class="input-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="text" id="expiryDate" name="expiryDate" class="in" required>
            </div>
            <div class="input-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" class="in" required>
            </div>
            <input type="submit" value="Pay" class="btn">
            <input type="reset" value="Reset" class="btn">
        </form>
    </div>
<script>
        document.getElementById("paymentForm").addEventListener("submit", function(event) {
            // Prevent form submission
            event.preventDefault();

            // Submit form via AJAX
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "generate_bill.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Show the bill in a prompt
                    alert(xhr.responseText);
                } else {
                    // Handle error
                    alert('Error: ' + xhr.statusText);
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>


<?php
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Include database connection
    include 'connect.php';
    
    // Get payment details from the form
    $cardname = $_POST['cardname'];
    $cardno = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    // Validate and sanitize the input data
    $cardname = mysqli_real_escape_string($con, $cardname);
    $cardno = mysqli_real_escape_string($con, $cardno);
    $expiryDate = mysqli_real_escape_string($con, $expiryDate);
    $cvv = mysqli_real_escape_string($con, $cvv);

    // Insert payment details into the payment table
    $sql = "INSERT INTO payment (cardname, card_number, expiry_date, cvv) VALUES ('$cardname', '$cardno', '$expiryDate', '$cvv')";
    if(mysqli_query($con, $sql)) {
        // Retrieve cart items from the database
        $select = "SELECT * FROM cart WHERE username='$username'";
        $query1 = mysqli_query($con, $select);

        // Calculate total amount
        $total = 0;

        // Output for the bill generation
        echo "<h1>Bill</h1>";
        echo "<ul>";

        // Insert cart items into the selling table and display them as the bill
        while ($row = mysqli_fetch_array($query1)) {
            $name = $row['name'];
            $qty = $row['qty'];
            $price = $row['price'];
            $subtotal = $row['subtotal'];
            $total += $subtotal;

            // Display item in the bill
            echo "<li>$name - $qty x $price = $subtotal</li>";

            // Insert into selling table
            $date = date("Y-m-d");
            $sql = "INSERT INTO selling (date, name, qty, price, subtotal) VALUES ('$date', '$name', '$qty', '$price', '$subtotal')";
            $result = mysqli_query($con, $sql);
        }

        // Clear the cart after placing the order
        $delete_cart = "DELETE FROM cart WHERE username='$username'";
        $delete_result = mysqli_query($con, $delete_cart);

        // Display total in the bill
        echo "</ul>";
        echo "<p>Total: $total</p>";

        if($delete_result) {
            // Redirect to home page after successful payment
            header("location: home.php");
            exit();
        } else {
            echo "Error: Unable to clear the cart.";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>

