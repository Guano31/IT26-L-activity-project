
    <?php
        $path = "./scr/";
        $about = file($path."text.txt");
         foreach($about as $bt){
    ?>
    <div class="aboutss"><p><?=$bt?></p></div>
<?php

         }
?>



