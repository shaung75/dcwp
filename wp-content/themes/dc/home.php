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

		<?php endwhile; endif; ?>

	</ul>

</div>

<?php get_footer(); ?>
