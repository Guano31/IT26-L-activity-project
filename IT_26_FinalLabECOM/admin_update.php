<?php
session_start();
include ("connect.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['name'];
   $product_price = $_POST['price'];
   $product_image = $_FILES['image']['name'];
   $product_image_tmp_name = $_FILES['image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE items SET name='$product_name', price='$product_price', image='$product_image'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM items WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   <div class="titlebtn"></div>
   <form action="" method="post" enctype="multipart/form-data">
  
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="name" value="<?php echo $row['name']; ?>" placeholder="enter the product name">
      <input type="number" min="0" class="box" name="price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      <input type="file" class="box" name="image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page.php" class="btn"> Go Back</a>
   </form>
   
   </div>

   <?php }; ?>

   

</div>

</div>

</body>
</html>                                                                                                     