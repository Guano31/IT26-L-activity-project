<?php
    include("./models/Employee.php");

    $list = array(
        new Employee("Tony","Stark","Software Developer","https://www.w3schools.com/howto/img_avatar.png"),
        new Employee("John","Doe","Programmer","https://www.w3schools.com/howto/img_avatar2.png"),
        new Employee("Peter","Quill","Designer","https://www.w3schools.com/howto/img_avatar.png"),
        new Employee("Steven","Strange","Full Stack","https://www.w3schools.com/howto/img_avatar2.png"),
        new Employee("Steven","Strange","Full Stack","https://www.w3schools.com/howto/img_avatar2.png")
        
        )
?>

<h1>List of employee</h1>
<div class="listing">

        <?php
            foreach($list as $e){  
                include("./widgets/emp-card.php");
            }
        ?>
             
</div>