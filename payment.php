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
    background-color: #108A4F;
}

.pay {
    background-color: #93c6ad80;
    padding: 40px;
    width: 400px;
    border-radius: 8px; /* Add border radius for a rounded look */
}

.btn {
    width: 100px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.in {
    width: 300px;
    height: 40px;
    margin-bottom: 10px; /* Add margin bottom for spacing */
}

/* Style for prompt */
.prompt {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 8px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none; /* Initially hide prompt */
}

</style>
</head>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Pay by Debit Card</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <form action="payment.php" method="post">
        <div id="DebitCard" class="pay">
            <h3>Pay by Debit Card</h3>
            <p>Total Bill is   <?php  echo $_SESSION['total']; ?></p>
       
            <p>Card Number</p>
            <input type="text" name="card" placeholder="Enter Card Number" class="in">
            <p>Atm Pin</p>
            <input type="text" name="atm" class="in">
            <p>CVV/CVC</p>
            <input type="text" name="cvv" class="in">
            <p>Card Holder Name</p>
            <input type="text" name="name" placeholder="Enter Card Holder Name" class="in">
            <br>
            <input type="submit" value="Pay" name="pay" class="btn">
            <input type="reset" value="Reset" class="btn">
            <a href="home.php"> Go to Home </a>
        </div>
    </form>
    <!-- Prompt for payment success -->
    <div id="paymentPrompt" class="prompt">
        Payment Successful!
    </div>
</body>
</html>

<script>
    // Function to show payment success prompt
    function showPaymentPrompt() {
        var prompt = document.getElementById("paymentPrompt");
        prompt.style.display = "block"; // Show the prompt
        // Hide the prompt after 3 seconds
        setTimeout(function() {
            prompt.style.display = "none";
        }, 3000); // 3000 milliseconds = 3 seconds
    }
</script>

<?php
if(isset($_POST['pay']))
{
 
    include 'connect.php';
$no=$_POST['card'];
$atm=$_POST['atm'];
$cvv=$_POST['cvv'];
$name=$_POST['name'];
$sql = "INSERT INTO `payment`(`cardno`, `atmpin`, `cvv`, `cardname`) VALUES ('$no','$atm','$cvv','$name')";
$result=mysqli_query($con,$sql);

if($result)
{
   
    $select = "select * from cart where username='$username'";
   
     $query1 = mysqli_query($con, $select);

     while ($row = mysqli_fetch_array($query1)) {
        $name=$row['name'];
        $qty=$row['qty'];
        $price=$row['price'];
        $stot=$row['subtotal'];
        $date=date("Y-m-d");
        $sql="INSERT INTO `selling`(`date`,`name`, `qty`, `price`, `subtotal`) VALUES ('$date','$name','$qty','$price','$stot')";
        $result=mysqli_query($con,$sql);
        
     }
    $dl="DELETE FROM `cart` where username='$username'";
    $r=mysqli_query($con,$dl);
    if($r)
    {
        $name=" ";
        $qty=" ";
        $price=" ";
        $stot=" ";
        $date=" ";
      unset($_SESSION['total']);
      $_SESSION['total']=" ";
        echo "<script>showPaymentPrompt();</script>";

       
    }

}

}


?>