<?php get_header(); ?>

<section class="banner flexslider">

</section>

<ul class="prod-list">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <li>
		<div class="cover-img">
			<a href="<?php the_permalink();?>">
				<?php woocommerce_template_loop_product_thumbnail();?>
			</a>
		</div>

		<h4><?php the_title();?></h4>

		<p><?php echo get_excerpt(50);;?></p>

		<?php 
			woocommerce_template_loop_price();

			woocommerce_template_loop_add_to_cart(); ?>
	</li>

<?php endwhile; 
	else:
?>
	<li><h4>No Products Found</h4></li>
<?php endif; ?>

</ul>

<?php get_footer(); ?>
