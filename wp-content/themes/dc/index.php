<?php get_header(); ?>

<?php 
	// Display Banner on home page
	if(is_front_page()):
		include('banner.php');
	else:
?>

<section class="banner flexslider">

</section>

<?php
	endif;
?>

<?php
	if(is_front_page()):
?>
	<h1 class="cont-heading">Best Sellers</h1>

	<div style="border: 2px solid #f00;">
		<p><strong>TODO: Bestsellers</strong></p>
	</div>
<?php
	endif;
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
