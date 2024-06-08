<?php
    $path = "./widgets/";
    $content = $path."content.php";
    $nav  = $path."main_menu.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="nav">
                <?php
                    include($nav)
                ?>
        </div>
        <div class="wrapper">
                <?php
                    include($content);
                ?>
        </div>
</body>
</html>