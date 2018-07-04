<a class="header__toggle-menu" href="#0" title="Menu"><span>
        <?php _e("Menu",'philosophy'); ?>
    </span></a>

<nav class="header__nav-wrap">

    <h2 class="header__nav-heading h6"><?php _e('Site Navigation','philosophy'); ?></h2>

    <?php
    wp_nav_menu( array(
        'theme_location' => 'topmenu',
        'menu_id'        => 'topmenu',
        'menu_class'     => 'header__nav'
    ) )
    ?>

    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">
        <?php _e('Close','philosophy') ?>
    </a>

</nav> <!-- end header__nav-wrap -->