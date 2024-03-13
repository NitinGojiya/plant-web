

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
    section{
        padding: 120px 19% 100px;
    }

    .main-top{
            display: flex;
            width: 100%
        }
        .main{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #00a3c8;
            color: #000;
            position: relative;
          
            
        }
        .tbody{
            display: flex;
            flex-direction: row;
            gap: 3rem;
            flex-wrap: wrap;
            border-bottom: #000 3px solid;
        }
        .tbody th{
            align-items: center;
            text-align: center;
            font-size: 1.3rem;
            width: 200px;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        .tbody td{
            align-items: center;
            text-align: center;
            font-size: 1.5rem;
            width: 200px;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        .button{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        .btn1{
            color: #fff;
            background-color: darkblue;
            height: 50px;
            width: 100px;
            font-size: 20px;
            border-radius: 5px;
        }
        .main{
            position: relative;
      
            
        }
        .main-top{
            display: flex;
            width: 100%
        }
        .thead{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .th{
            display: flex;
            gap: 50px;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: darkblue;
            height: 60px;
        }
        .th div{
            width: 150px;
            height: auto;
            font-size: 1.3rem;
            font-weight: 600;
            
        }
        .contain{
            display: flex;
            gap: 50px;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #191c24;
            color: #ffffff;
            transition: ease .5s;
            height: 60px;
        }
        .contain div{
            width: 150px;
            height: auto;
            font-size: 1.3rem;
        }
        .action-btn{ 
            border: #000 1px solid ;
            background-color: darkblue;
            color: #ffffff;
        }
        a{
            text-decoration: none;
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

 <section class="main" id="today">
        <div class="main-top">
                <h1 style="color: #fff; text-decoration:underline; margin-bottom:20px;margin-left:250px;">Today </h1>
            </div>
            <div class="thead">
        <div class="th">
            <div>Plant Name</div>
            <div>Qty</div>
            <div>price</div>
            <div>Total</div>
         
            
           
            
           
        </div>
        <?php
    include 'connect.php';
    $d= date("Y-m-d");
    $sql = "SELECT * FROM `selling` WHERE date='$d'";
    $result = mysqli_query($con, $sql);
    $total=0;
    if ($result) 
    {
        while ($row = mysqli_fetch_array($result)) {
            $total=$total+$row['subtotal'];
    ?>
            <div class="contain">
            <div><?php echo $row['name']; ?></div>
            <div><?php echo $row['qty']; ?></div>
            <div><?php echo $row['price']; ?></div>
            <div><?php echo $row['subtotal']; ?></div>
          
        
        
            
          
               
        </div>
            <?php
        }}
        ?>
    </div>
    <div class="contain">
            <div>Today Total: Rs.<?php echo $total; ?></div>
    </div>
        </section>
      
            


</body>
</html>