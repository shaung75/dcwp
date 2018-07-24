<?php
/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version 	1.0.2
 * 
 * Theme Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function green_farm_theme_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('green-farm-composer-shortcodes-extend', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-theme-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('green-farm-composer-shortcodes-extend', 'cmsmasters_theme_shortcodes', array( 
			'blog_field_layout_mode_puzzle' => 			esc_attr__('Puzzle', 'green-farm'), 
			'quotes_field_slider_type_title' => 		esc_attr__('Slider Type', 'green-farm'), 
			'quotes_field_slider_type_descr' => 		esc_attr__('Choose your quotes slider style type', 'green-farm'), 
			'quotes_field_type_choice_box' => 			esc_attr__('Boxed', 'green-farm'), 
			'quotes_field_type_choice_center' => 		esc_attr__('Centered', 'green-farm'), 
			'quotes_field_item_color_title' => 			esc_attr__('Color', 'green-farm'), 
			'quotes_field_item_color_descr' => 			esc_attr__('Enter this quote custom color', 'green-farm'), 
			'featured_block_link' =>	 				esc_attr__('Featured Block Link', 'green-farm'), 
			'featured_block_link_descr' =>	 			esc_attr__('Enter featured block link here', 'green-farm'), 
			'featured_block_target' =>	 				esc_attr__('Featured Block Target', 'green-farm'), 
			'featured_block_target_descr' =>	 		esc_attr__('Enter featured block target here', 'green-farm'), 
			'featured_block_hover' =>	 				esc_attr__('Featured Block Hover', 'green-farm'), 
			'featured_block_hover_descr' =>	 			esc_attr__('Add hover for this featured block', 'green-farm')
		));
	}
}

add_action('admin_enqueue_scripts', 'green_farm_theme_register_c_c_scripts');



// Quotes Shortcode Attributes Filter
add_filter('cmsmasters_quotes_atts_filter', 'cmsmasters_quotes_atts');

function cmsmasters_quotes_atts() {
	return array( 
		'shortcode_id' => 		'', 
		'mode' => 				'grid', 
		'type' => 				'boxed', 
		'columns' => 			'3', 
		'speed' => 				'10', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}



// Featured Block Shortcode Attributes Filter
add_filter('cmsmasters_featured_block_atts_filter', 'cmsmasters_featured_block_atts');

function cmsmasters_featured_block_atts() {
	return array( 
		'shortcode_id' => 					'', 
		'text_width' => 					'100', 
		'text_position' => 					'center', 
		'text_padding' => 					'', 
		'text_align' => 					'left', 
		'color_overlay' => 					'', 
		'fb_bg_color' => 					'', 
		'bg_img' => 						'', 
		'bg_position' => 					'', 
		'bg_repeat' => 						'', 
		'bg_attachment' => 					'', 
		'bg_size' => 						'', 
		'link' => 							'', 
		'target' => 						'', 
		'hover' => 							'', 
		'top_padding' => 					'', 
		'bottom_padding' => 				'', 
		'resp_vert_pad' => 					'', 
		'padding_top_laptop' => 			'', 
		'padding_bottom_laptop' => 			'', 
		'padding_top_tablet' => 			'', 
		'padding_bottom_tablet' => 			'', 
		'padding_top_mobile_h' => 			'', 
		'padding_bottom_mobile_h' =>		'', 
		'padding_top_mobile_v' => 			'', 
		'padding_bottom_mobile_v' => 		'', 
		'border_radius' => 					'', 
		'animation' => 						'', 
		'animation_delay' => 				'', 
		'classes' => 						'' 
	);
}