<?php
session_start();
include ("connect.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add-to-cart'])) {
    $item_id = $_GET['id'];
    $item_name = $_POST['name'];
    $item_image = $_POST['image'];
    $item_price = $_POST['price'];
    $item_quantity = $_POST['quantity'];

    $item_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $item_id) {
            $item['quantity'] += $item_quantity;
            $item_exists = true;
            break;
        }
    }

    if (!$item_exists) {
        $session_array = array(
            'id' => $item_id,
            'name' => $item_name,
            'image' => $item_image,
            'price' => $item_price,
            'quantity' => $item_quantity
        );
        $_SESSION['cart'][] = $session_array;
    }
}

if (isset($_POST['update-cart'])) {
    foreach ($_POST['quantities'] as $item_id => $quantity) {
        if ($quantity <= 0) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $item_id) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        } else {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $item_id) {
                    $item['quantity'] = $quantity;
                    break;
                }
            }
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "clearall") {
        unset($_SESSION['cart']);
    }

    if ($_GET['action'] == "remove") {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array
    }
}
?>

<?php
    $path = "./widgets/";
    $header = $path . "header.php";
    $nav = $path."main_menu.php";

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart!</title>
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

    <div class="container-fluid col-md-12">
        <div class="row">
           
            <div class=" ">
                <h2 class="text-center">Item Selected</h2>
                <div class="table-responsive">
                    <form method="post" action="mycart.php">
                        <table class="table table-bordered table-striped  ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                    <th>Item Image</th>
                                    <th>Item Quantity</th>
                                    <th>Total Price</th>
                                    <th colspan="4" class="text-center ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                if (!empty($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $totalPrice = $value['price'] * $value['quantity'];
                                        $total += $totalPrice;

                                        ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td>₱<?= number_format($value['price'], 2) ?></td>
                                            <td><img src="images/<?= $value['image'] ?>" class="item-image" style="height: 50px; width: 70px;" alt="<?= $value['name'] ?>"></td>
                                            <td>
                                                <input type="number" name="quantities[<?= $value['id'] ?>]"
                                                    value="<?= $value['quantity'] ?>" class="form-control" min="1">
                                            </td>
                                            <td>₱<?= number_format($totalPrice, 2) ?></td>
                                            <td>
                                                <a href="mycart.php?action=remove&id=<?= $value['id'] ?>"
                                                    class="btn btn-danger">Remove</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Your cart is empty</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"><b>Total Price</b></td>
                                    <td colspan="3" class="text-center">₱<?= number_format($total, 2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <a href="mycart.php?action=clearall" class="btn btn-warning">Clear Cart</a>
                                        <button type="submit" name="update-cart" class="btn btn-success">Update
                                            Cart</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        footer * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        footer {
            padding: 70px 0;
            color: #fff;
            background-color: #24262b;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col1 ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300px;
            display: block;
        }

        .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 30px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: red;
            height: 2px;
            box-sizing: border-box;
            width: 60px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300px;
            color: gray;
            display: block;
        }

        .product-card {
            border: 5px solid black;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 280px;
        }

        .product-image {
            object-fit: cover;
            width: 100%;
            height: 200px;
            aspect-ratio: 1 / 1;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .card-title {
            margin: 10px 0;
        }

        .card-text {
            margin: 10px 0;
        }

        .form-group {
            margin: 10px 0;
        }

        .btn {
            width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .btn-len {
            width: 150px;
        }
    </style>




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