<?php get_header(); ?>

<section class="banner flexslider">

</section>

<h1 class="cont-heading">DADDY COOL'S BLOG</h1>

<div class="subpage-contener">

	<ul class="blog-post-list">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<li>
		
			<div class="_cover">

				<?php the_post_thumbnail( 'blog-thumb' ); ?>

			</div>

			<h3><?php the_title();?></h3>

			<?php the_excerpt();?>

			<a class="butn-1" href="<?php the_permalink();?>">Read More</a>

		</li>

		<?php endwhile; ?>

		<?php else : ?>
			
			<li><?php _e('Sorry, no posts matched your criteria.'); ?></li>
		
		<?php endif; ?>

	</ul>

	<div class="clear"></div>
	
	<div style="text-align: center">	

		<hr style="height: 1px; background: #c60200; border: none;margin: 20px 0px;">
		
		<?php previous_posts_link( 'Newer posts' ); ?> <?php next_posts_link( 'Older posts' ); ?>

	</div>

</div>

<?php get_footer(); ?>
