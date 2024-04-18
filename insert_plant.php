
<?php

session_start();
$username=$_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
<style>
     *{
            padding: 0;
            margin: 0;
        }
        .main{
            display: flex;
         
            flex-direction: column;
            background-color: #108A4F;
            
        }
        .left-navigation ul{
            display: flex;
            background-color: #002B46;
            height: 60px;
            font-size: 1.3rem;
            justify-content: space-evenly;
          
            align-items:center;
        }
       #categoriesDropdown{
            display: flex;
            flex-direction: column;
         position: relative;
        
          
        }
       
        #categoriesDropdown a{
            color: white;
        }
        .left-navigation ul li{
            list-style: none;
        }
        .left-navigation ul li a{
           
            list-style:none;
        color:white;
        text-decoration: none;

        }
        .left-navigation ul li a:hover{
            color: #108A4F;
        }
        .sell{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;

           
        }
        :root{
        --bg-color: #191919;
        --secont-bg-color: #101010;
        --main-color: #00a3c8;
        --text-color: #000;
        --second-color: #000;
        --other-color: #808080;

        --h1-font: 7rem;
        --h2-font: 7rem;
        --p-font: 1.1rem;
    }
    
  
    .logo{
        color: #000;
        font-size: 40px;
        font-weight: bold;
    }
    .logo span{
        color:red;
    }
    .navlist{
        display: flex;
    }
    #menu-icon{
        font-size: 42px;
        color: var(--text-color);
        z-index: 10001;
        cursor: pointer;
        display: none;
    }
    .navlist a{
        color: var(--second-color);
        font-size: var(--p-font);
        font-weight: 600;
        margin: 0 40px;
        transition: all ease .40s;
        font-family: 'Special Elite', serif;
    }
    .navlist a:hover{
        color: var(--main-color);
        font-size: 18px;
        text-shadow: 0 10px 10px 0 var(--main-color);
        transition: all ease .30s;
    }
body{
   
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
    .insert{
        margin-left: 350px;
        margin-top: 60px;
    }
</style>
</head>

<body>
<div class="left-navigation">
    <ul>
    <li><a  href="#">Admin</a></li>
    <li><a  href="admin.php">Today Selling</a></li>
        <li><a  href="total_sell.php">Total selling</a></li>
        <li><a href="insert_plant.php">Insert Plants</a></li>
       
        <li>
            <!-- Add a class to the button for styling and reference in JavaScript -->
            <a href="delete_plant.php" class="categories-button" id="m" >Delete Plants</a>
      
            <!-- Categories dropdown content -->
           
        </li>
        <li><a href="alogout.php">Logout</a></li>
        
    </ul>
 </div>	
<div class="insert">
	
<form action="insert_plant.php" method="post">
	<div id="DebitCard"  class="pay">
		<h3>Insert Plant Detail</h3>
		<p>Plant Name</p>
        <input type="text" name="name" placeholder="Plant Name" class="in">
        <p>Plant Type</p>
		<select name="type"  class="in">
         <option>Flowering Plants</option>
                <option>Succulents</option>
                <option>Trees</option>
                <option>Herbs</option>
                <option>Ferns</option>
                <option>Shrubs</option>
        </select>
        <p>Photo</p>
		<input type="text" name="photo" placeholder="Parth of the photo" class="in">
        <p>Price</p>
		<input type="text" name="price" placeholder="Price" class="in">
     
     
	
		
	
		<br>
		
        <input type="submit" value="Insert" name="Insert" class="btn">
       
		<input type="reset" value="Reset" class="btn">
	</div>

	
	</form>
    </div>
</body>
</html>
<?php
if(isset($_POST['Insert']))
{
  include 'connect.php';
$name=$_POST['name'];
$type=$_POST['type'];
$photo=$_POST['photo'];
$price=$_POST['price'];


$sql="INSERT INTO `plant`( `name`,`type`, `photo`, `price`) VALUES ('$name','$type','$photo','$price')";
$result=mysqli_query($con,$sql);
if($result)
{
echo '<script>alert("PLant Insert");</script>';
}
}

?>