<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('flower-vase1.png');
        }
        .categories-dropdown-content{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 800px;
            gap: 30px;
        }
        .categories-dropdown-content div{
            height: 200px;
            width: 300px;
            border-radius: 26px;
background: #9c7373;
box-shadow:  5px 5px 10px #5a4343,
             -5px -5px 10px #dea3a3;
        }

        a{
            font-size: 2rem;
            color: white;
            text-decoration: none;
        }
        .categories-dropdown-content div {
            display: flex;

            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<div id="categoriesDropdown" class="categories-dropdown-content">
            <div><a href="floweringplant.php">Flowering Plants</a></div>
            <div> <a href="Succulents.php">Succulents</a></div>
            <div> <a href="Trees.php">Trees</a></div>
            <div><a href="Herbs.php">Herbs</a></div>
            <div> <a href="Ferns.php">Ferns</a></div>
            <div> <a href="Shrubs.php">Shrubs</a></div>
			<div> <a href="Home.php">Back To Home</a></div>  
        </div>
</body>
</html>