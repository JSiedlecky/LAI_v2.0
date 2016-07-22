<div id="toppanel">
    <section class="hideshow_sidebar left">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </section>
    <section class="homepage left">
        <a href="index.php">Strona domowa</a>
    </section>

    <section class="logout right">
        <a href="logout.php">
            <i class="fa fa-power-off fa-lg" aria-hidden="true"></i>
            &nbsp; Wyloguj
        </a>
    </section>
    <section class="user right">
        <a href="index.php?page=user" title="<?php echo $user->getDisplayName(); ?>">
            <i class="fa fa-user fa-lg" aria-hidden="true"></i>
            &nbsp; <?php echo $user->getDisplayName(); ?>
        </a>
    </section>
    <section class="notifications right">
        <i class="fa fa-bell-o fa-lg" aria-hidden="true"></i>
    </section>
</div>