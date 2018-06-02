<?php get_header(); ?>

<section class="banner flexslider">

</section>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1 class="cont-heading"><?php the_title();?></h1>

	<div class="subpage-contener">

		<?php get_template_part( 'content', get_post_format() ); ?>

		<div style="padding-bottom:10px;float:right;">
	
			<input type="button" value="Back To Blog" class="butn-1" onclick="javascript:window.location.href='<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>'">
	
		</div>

		<div class="clear"></div>
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
