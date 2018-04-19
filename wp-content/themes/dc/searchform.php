	<form class="srch-box" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter product name or keyword', 'daddy' ); ?>" />
		<input type="submit" class="_butn submit" name="submit" id="searchsubmit" value="" />
	</form>