<?php
session_start();
$username = $_SESSION['username'];

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Include database connection
    include 'connect.php';
    
    // Get payment details from the form
    $cardname = $_POST['cardname'];
    $cardno = $_POST['cardno'];
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
        $bill_output = "<h1>Bill</h1>";
        $bill_output .= "<ul>";

        // Insert cart items into the selling table and display them as the bill
        while ($row = mysqli_fetch_array($query1)) {
            $name = $row['name'];
            $qty = $row['qty'];
            $price = $row['price'];
            $subtotal = $row['subtotal'];
            $total += $subtotal;

            // Display item in the bill
            $bill_output .= "<li>$name - $qty x $price = $subtotal</li>";

            // Insert into selling table
            $date = date("Y-m-d");
            $sql = "INSERT INTO selling (date, name, qty, price, subtotal) VALUES ('$date', '$name', '$qty', '$price', '$subtotal')";
            $result = mysqli_query($con, $sql);
        }

        // Clear the cart after placing the order
        $delete_cart = "DELETE FROM cart WHERE username='$username'";
        $delete_result = mysqli_query($con, $delete_cart);

        // Display total in the bill
        $bill_output .= "</ul>";
        $bill_output .= "<p>Total: $total</p>";

        // Return the bill details
        echo $bill_output;
        
        exit(); // Stop further execution
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
    <style>
.bill-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    max-width: 600px;
}

.bill-container h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

.bill-container ul {
    list-style-type: none;
    padding: 0;
}

.bill-container li {
    font-size: 16px;
    margin-bottom: 10px;
}

.bill-container p {
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
    text-align: right;
}

      
    </style>
</head>