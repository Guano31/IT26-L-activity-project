<?php
$path = "./widgets/";
$header = $path . "header.php";
$nav = $path . "main_menu.php";
$abouts = $path . "about_content.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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

    <div class="heading_us">
        <h1>3R CYLE PARTS TRADING</h1>
        <p>Get ready to upgrade with our top-notch motor parts selection!
        <br>Welcome to your one-stop shop for high-quality motor parts where performance meets precision!</p>
    </div>
    <div class="container_us">
        <section class="about">
            <div class="about-img">
                <img src="images/3r.jpg" alt="" class="hero-img">
            </div>
            <div class="about-content">
                <h2>REV UP</h2>
                <?php
                    include($abouts);

                ?>
                
                <a href="" class="read-more">Read More</a>
            </div>
        </section>
    </div>
</body>


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

</html>