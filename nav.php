<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
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
      
    </style>
</head>
<body>
<div class="left-navigation">
    <ul>
    <li><a  href="home.php">Home</a></li>
        <li><a  href="profile.php">Profile</a></li>
        <li><a href="cart.php">My Orders</a></li>
       
        <li>
            <!-- Add a class to the button for styling and reference in JavaScript -->
            <a href="cate.php" class="categories-button" id="m" >Categories</a>
      
            <!-- Categories dropdown content -->
           
        </li>
        <li><a href="login.php">login</a></li>
    </ul>
 </div>

</body>
</html>