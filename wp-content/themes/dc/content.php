<?php

$class = is_front_page() ? 'home-txt' : 'content' ;

?>

<div class="<?php echo $class;?>">
	<?php the_content(); ?>
</div>