<?php

/*	
	Fucntions file for Daddy Cool's Chilli Sacue
*/

function register_dc_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_dc_menu' );