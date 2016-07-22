<?php
$menu_arr = "";

$db = new Database();
$menu_arr = $db->Select('left_menu',['display_string','page_scheme']);
$menu_show = $db->Select('users',['display_lm']);
$db->Disconnect();

?>

<div id="left-sidebar" data-show="<?php echo $menu_show[0]['display_lm']; ?>">
    <ul>
        <?php

            foreach ($menu_arr as $item) {
                $active = "";
                if(isset($_GET['page']) && $_GET['page'] == $item['page_scheme']) $active = 'class="active"';
                echo '<li '.$active.'><a href="index.php?page='.$item['page_scheme'].'">'.$item['display_string'].'</a></li>';
            }

        ?>
    </ul>
</div>