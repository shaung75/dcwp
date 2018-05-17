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

	<ul class="prod-list">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 20,
			'orderby' => 'rand'
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
	?>
			<li>
				<div class="cover-img">
					<a href="<?php the_permalink();?>">
						<?php woocommerce_template_loop_product_thumbnail();?>
					</a>
				</div>

				<h4><?php the_title();?></h4>
			</li>
	<?php
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
	</ul><!--/.products-->
<?php
	else:
?>
	<h1 class="cont-heading"><?php the_title();?></h1>
<?php
	endif;
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
