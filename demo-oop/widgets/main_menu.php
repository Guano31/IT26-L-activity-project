<?php
    $srcPath = "./src/";
    $menu = file($srcPath."main-menu.txt",FILE_IGNORE_NEW_LINES);
?>

<ul>
    <?php
        foreach($menu as $i){
        list($text, $link) = explode(",",$i);
    ?>
        <li><a href="<?=$link?>"><?=$text?></a></li>
    <?php
        }
    ?>
</ul>