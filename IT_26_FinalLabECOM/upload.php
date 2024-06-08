<?php
include("connect.php");

if(isset($_POST["submit"])){
    $name = $_POST["fullname"];
    $price = $_POST["price"];
    $fileName = $_FILES["image"]["name"];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");

    echo "File Extension: $ext<br>";
    echo "Allowed Types: " . implode(", ", $allowedTypes) . "<br>";

    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "images/".$fileName;
    if(in_array(strtolower($ext), $allowedTypes)){
        if(move_uploaded_file($tempName, $targetPath)){
            $query = "INSERT INTO items (name, price, image) VALUES ('$name', '$price', '$fileName')";
            if(mysqli_query($conn, $query)){
                header("Location: index.php");
            }else{
                echo "Something is wrong";
            }
        }else{
            echo "File is not uploaded";
        }
    }else{
        echo "Your files are not allowed";
    }
}
?>
