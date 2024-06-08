<?php
session_start();
include ("connect.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_product'])) {

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_FILES['image']['name'];
    $product_image_tmp_name = $_FILES['image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;

    if (empty($product_name) || empty($product_price) || empty($product_image)) {
        $message[] = 'Please fill out all fields';
    } else {
        $insert = "INSERT INTO items(name, price, image) VALUES('$product_name', '$product_price', '$product_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully';
        } else {
            $message[] = 'Could not add the product';
        }
    }
}
?>

<?php
$path = "./widgets/";
$header = $path . "header.php";
$nav = $path . "main_menu.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create product</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" <link
        rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
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

    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<div class="message">' . $msg . '</div>';
        }
    }
    ?>

    <div class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h3>Add a new product</h3>
            <input type="text" placeholder="Enter product name" name="name" class="box">
            <input type="number" placeholder="Enter product price" name="price" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
            <input type="submit" class="btn_fill" name="add_product" value="Add Product">
        </form>

    </div>

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
                        <a href="https://www.facebook.com/profile.php?id=100094594041008" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>