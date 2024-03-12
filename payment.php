
<?php

session_start();
$username=$_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #108A4F;
}
.pay{
    background-color:#93c6ad80;
    padding: 40px;
    width: 400px;
}
	.btn{
width: 100px;
margin-top: 10px;
margin-bottom: 10px;
    }
    .in{
        width: 300px;
        height: 40px;
    }
</style>
</head>

<body>
	

	
<form action="payment.php" method="post">
	<div id="DebitCard"  class="pay">
		<h3>Pay by Debit Card</h3>
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
	</div>

	
	</form>
		
</body>
</html>
<?php
if(isset($_POST['pay']))
{
  include 'connect.php';
$no=$_POST['card'];
$atm=$_POST['atm'];
$cvv=$_POST['cvv'];
$name=$_POST['name'];
$sql="SELECT * FROM `payment`";
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result))
{
if($no==$row['cardno'] && $atm==$row['atmpin'] && $cvv==$row['cvv'] && $name==$row['cardname']  )
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
        header("location:home.php");
    }
}

}
}

?>