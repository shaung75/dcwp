<nav>
    <!--
<a href="#">Home</a>

<span>
    <a href="#">** TO DO -- NAV **</a>
    <ul>
        <li>
            <a href="#">** SUB PAGE **</a></li>
        <li>
            <a href="#">** SUB PAGE **</a></li>
        <li>
            <a href="#">** SUB PAGE **</a></li>
        <li>
            <a href="#">** SUB PAGE **</a></li>
    </ul>
</span>

<a href="#">Recipes</a>
<a href="#"">Blog</a>
<a href="#">Wholesale Enquiry</a>
    -->
<?php
    wp_nav_menu( array(
        'container_class' => '',
        'container' => '',
        'theme_location' => 'header-menu',
        'walker' => new DC_Walker(),
        'items_wrap' => '%3$s'
    ) );
?>
</nav>
