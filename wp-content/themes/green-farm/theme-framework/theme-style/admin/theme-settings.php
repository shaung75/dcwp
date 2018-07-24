<?php 
/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version		1.0.2
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */


/* General Settings */
function green_farm_theme_options_general_fields($options, $tab) {
	if ($tab == 'header') {
		$new_options = array();
		
		foreach ($options as $option) {
			if ($option['id'] == 'green-farm_header_styles') {
				$option['choices'][] = esc_html__('Fullwidth Header Style', 'green-farm') . '|fullwidth';
				
				$new_options[] = $option;
			} else {
				$new_options[] = $option;
			}
		}
		
		$options = $new_options;
	}
	
	
	return $options;
}

add_filter('cmsmasters_options_general_fields_filter', 'green_farm_theme_options_general_fields', 10, 2);

