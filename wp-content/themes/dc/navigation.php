<nav>
    <!--
        <a href="<?php echo get_bloginfo( 'wpurl' );?>">Home</a>

        <span>
            <a href="<?php echo get_bloginfo( 'wpurl' );?>">** TO DO -- NAV **</a>
            <ul>
                <li>
                    <a href="<?php echo get_bloginfo( 'wpurl' );?>/">** SUB PAGE **</a></li>
                <li>
                    <a href="<?php echo get_bloginfo( 'wpurl' );?>/">** SUB PAGE **</a></li>
                <li>
                    <a href="<?php echo get_bloginfo( 'wpurl' );?>/">** SUB PAGE **</a></li>
                <li>
                    <a href="<?php echo get_bloginfo( 'wpurl' );?>/">** SUB PAGE **</a></li>
            </ul>
        </span>

        <a href="<?php echo get_bloginfo( 'wpurl' );?>/recipe">Recipes</a>
        <a href="<?php echo get_bloginfo( 'wpurl' );?>/blog">Blog</a>
        <a href="<?php echo get_bloginfo( 'wpurl' );?>/whole_enq">Wholesale Enquiry</a>
        <a href="<?php echo get_bloginfo( 'wpurl' );?>/coming_soon">Coming Soon!</a>
        <a href="<?php echo get_bloginfo( 'wpurl' );?>/contact">Contact</a>
    -->
        <?php
            wp_nav_menu( array(
                'container_class' => 'my_extra_menu_class',
                'container' => '',
                'theme_location' => 'header-menu',
                'walker' => new DC_Walker(),
                'items_wrap' => '%3$s'
            ) );
        ?>
</nav>
