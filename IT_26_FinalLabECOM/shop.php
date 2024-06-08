<?php
    $path = "./widgets/";
    $header = $path."header.php";
    $nav = $path."main_menu.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">


</head>

<body>
    
<div class="header">
        <?php
        include ($header);
        ?>
    </div>


    <div class="navimain">
                <?php
                    include ($nav);
                ?>

            </div>

    <div class="maintitle">
        <h2>COLLECTION</h2><br>
        <div class="filter-condition">
            <select name="" id="selects">
                <option value="Default">Default</option>
                <option value="LowToHigh">Low to High</option>
                <option value="HighToLow">High to Low</option>
            </select>
            <span>View As a</span>
        </div>

        <?php
        include ("connect.php");
        $query = "SELECT * FROM items";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="containercard ">
                <div class="card card-1">
                <form method="post" action="mycart.php?id=<?= $row['id'] ?>" class="product-card mb-4">
                    <img src="uploaded_img/<?= $row['image'] ?>" class="cardimg" alt="<?= $row['name'] ?>">
                    <h5 class="card-title text-center "><?= $row['name'] ?></h5>
                    <span style="font-size: 80%; color: #808080;">★★★★☆ 20 solds</span>
                    <input type="hidden" name="price" value="<?= $row['price'] ?>">
                    <p class="card-text text-center"><strong>₱<?= $row['price'] ?></strong></p>
                    <input type="hidden" name="name" value="<?= $row['name'] ?>">
                    <input type="hidden" name="image" value="<?= $row['image'] ?>">
                    <div class="form-group">
                        <label for="quantity-<?= $row['id'] ?>">Quantity:</label>
                        <input type="number" id="quantity-<?= $row['id'] ?>" name="quantity" value="1" class="form-control"
                            min="1">
                    </div>

                    <div class="d-grid gap-2">
                        <input type="submit" name="add-to-cart" class="btn btn-warning mt-3" value="Add To Cart">
                    </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>

            

    
    <div class="sponsor"></div>
    <hr>
        <div class="logo">
           
            <div class="logo1">
                <a href="https://mc.suzuki.com.ph/ "target="_blank"><img src="images/2560px-Suzuki_logo_2.svg.png" alt=""></a>
            </div>
            <div class="logo2">
                <a href="https://www.yamaha-motor.com.ph/ "target="_blank"><img src="images/yamaha-logo-yamaha-icon-transparent-free-png.webp" alt=""></a>
            </div>
            <div class="logo3">
                <a href="https://philippinerusi.wordpress.com/products/" target="_blank"><img src="images/rusi.png" alt=""></a>
            </div>
            <div class="logo4">
               <a href="https://www.racingboy.com.ph/" target="_blank"> <img src="images/rcb logo.png" alt=""></a>
            </div>
        </div </div>


        <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 				<li><a href="#">affiliate program</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">shipping</a></li>
  	 				<li><a href="#">returns</a></li>
  	 				<li><a href="#">order status</a></li>
  	 				<li><a href="#">payment options</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>online shop</h4>
  	 			<ul>
  	 				<li><a href="#">scooters</a></li>
  	 				<li><a href="#">standard</a></li>
  	 				<li><a href="#">off-road</a></li>
  	 				<li><a href="#">sports</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="https://www.facebook.com/profile.php?id=100094594041008" target="_blank"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
  	 				<a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

</body>

</html>

<script type="text/javascript" src="java/script.js"> </script>