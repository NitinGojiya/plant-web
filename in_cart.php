<?php
include 'connect.php';

 if(isset($_POST['buy']))
 {
    session_start();
    $qty=$_POST["quantity"];
    $price=$_POST["price"];
    $name=$_POST["name"];
    $username=$_SESSION['username'];
$stot=$qty*$price;
    $sql="INSERT INTO `cart`(`username`,`name`, `qty`, `price`, `subtotal`) VALUES ('$username','$name','$qty','$price','$stot')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        header("location:cart.php");
    }

 }

 

?>