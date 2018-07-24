<?php 
/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version		1.0.8
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('green_farm_settings_general_defaults')) {

function green_farm_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'green-farm' . '_theme_layout' => 		'liquid', 
			'green-farm' . '_logo_type' => 			'image', 
			'green-farm' . '_logo_url' => 			'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'green-farm' . '_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'green-farm' . '_logo_title' => 			get_bloginfo('name') ? get_bloginfo('name') : 'Green Farm', 
			'green-farm' . '_logo_subtitle' => 		'', 
			'green-farm' . '_logo_custom_color' => 	0, 
			'green-farm' . '_logo_title_color' => 	'', 
			'green-farm' . '_logo_subtitle_color' => 	'' 
		), 
		'bg' => array( 
			'green-farm' . '_bg_col' => 			'#ffffff', 
			'green-farm' . '_bg_img_enable' => 	0, 
			'green-farm' . '_bg_img' => 			'', 
			'green-farm' . '_bg_rep' => 			'no-repeat', 
			'green-farm' . '_bg_pos' => 			'top center', 
			'green-farm' . '_bg_att' => 			'scroll', 
			'green-farm' . '_bg_size' => 			'cover' 
		), 
		'header' => array( 
			'green-farm' . '_fixed_header' => 				1, 
			'green-farm' . '_header_overlaps' => 				1, 
			'green-farm' . '_header_top_line' => 				0, 
			'green-farm' . '_header_top_height' => 			'35', 
			'green-farm' . '_header_top_line_short_info' => 	'', 
			'green-farm' . '_header_top_line_add_cont' => 	'social', 
			'green-farm' . '_header_styles' => 				'fullwidth', 
			'green-farm' . '_header_mid_height' => 			'85', 
			'green-farm' . '_header_bot_height' => 			'60', 
			'green-farm' . '_header_search' => 				1, 
			'green-farm' . '_header_add_cont' => 				'none', 
			'green-farm' . '_header_add_cont_cust_html' => 	'' 
		), 
		'content' => array( 
			'green-farm' . '_layout' => 					'fullwidth', 
			'green-farm' . '_archives_layout' => 			'fullwidth', 
			'green-farm' . '_search_layout' => 			'fullwidth', 
			'green-farm' . '_other_layout' => 			'fullwidth', 
			'green-farm' . '_heading_alignment' => 		'center', 
			'green-farm' . '_heading_scheme' => 			'first', 
			'green-farm' . '_heading_bg_image_enable' => 	0, 
			'green-farm' . '_heading_bg_image' => 		'', 
			'green-farm' . '_heading_bg_repeat' => 		'no-repeat', 
			'green-farm' . '_heading_bg_attachment' => 	'scroll', 
			'green-farm' . '_heading_bg_size' => 			'cover', 
			'green-farm' . '_heading_bg_color' => 		'#31333b', 
			'green-farm' . '_heading_height' => 			'250', 
			'green-farm' . '_breadcrumbs' => 				1, 
			'green-farm' . '_bottom_scheme' => 			'footer', 
			'green-farm' . '_bottom_sidebar' => 			1, 
			'green-farm' . '_bottom_sidebar_layout' => 	'131313' 
		), 
		'footer' => array( 
			'green-farm' . '_footer_scheme' => 				'footer', 
			'green-farm' . '_footer_type' => 					'small', 
			'green-farm' . '_footer_additional_content' => 	'social', 
			'green-farm' . '_footer_logo' => 					1, 
			'green-farm' . '_footer_logo_url' => 				'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'green-farm' . '_footer_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'green-farm' . '_footer_nav' => 					0, 
			'green-farm' . '_footer_social' => 				1, 
			'green-farm' . '_footer_html' => 					'', 
			'green-farm' . '_footer_copyright' => 			'&copy; ' . date('Y') . ' ' . 'Green Farm' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Add Google Font */
if (!function_exists('green_farm_add_foogle_font')) {

function green_farm_add_foogle_font($fonts) {
	$fonts['Crimson+Text:400,400italic,700,700italic'] = 'Crimson Text';
	$fonts['Anton:sans-serif'] = 'Anton';
	$fonts['Slabo 27px:serif'] = 'Slabo 27px';
	$fonts['Chelsea Market:cursive'] = 'Chelsea Market';
	
	
	return $fonts;
}

}

add_filter('green_farm_google_fonts_list_filter', 'green_farm_add_foogle_font');



/* Theme Settings Fonts Default Values */
if (!function_exists('green_farm_settings_font_defaults')) {

function green_farm_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'green-farm' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Slabo 27px:serif', 
				'font_size' => 			'16', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'green-farm' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400italic,700,700italic', 
				'font_size' => 			'16', 
				'line_height' => 		'30', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'green-farm' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'green-farm' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'26', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'green-farm' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'26', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			) 
		), 
		'heading' => array( 
			'green-farm' . '_h1_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Anton:sans-serif', 
				'font_size' => 			'42', 
				'line_height' => 		'50', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'green-farm' . '_h2_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Anton:sans-serif', 
				'font_size' => 			'26', 
				'line_height' => 		'34', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'green-farm' . '_h3_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Chelsea Market:cursive', 
				'font_size' => 			'20', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'green-farm' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400italic,700,700italic', 
				'font_size' => 			'20', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'green-farm' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Chelsea Market:cursive', 
				'font_size' => 			'16', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'green-farm' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400italic,700,700italic', 
				'font_size' => 			'16', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'green-farm' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Roboto:300,300italic,400,400italic,500,500italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'44', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'green-farm' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Crimson+Text:400,400italic,700,700italic', 
				'font_size' => 			'16', 
				'line_height' => 		'24', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none' 
			), 
			'green-farm' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Slabo 27px:serif', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'green-farm' . '_quote_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Chelsea Market:cursive', 
				'font_size' => 			'20', 
				'line_height' => 		'32', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#000000', 
		'#ffffff', 
		'#7b7b7b', 
		'#92b955', 
		'#93846f', 
		'#373333', 
		'#faf8f2', 
		'#e9e5da' 
	);
	
	
	return $palettes;
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('green_farm_color_schemes_defaults')) {

function green_farm_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#7b7b7b', 
			'link' => 		'#92b955', 
			'hover' => 		'#93846f', 
			'heading' => 	'#373333', 
			'bg' => 		'#ffffff', 
			'alternate' => 	'#faf8f2', 
			'border' => 	'#e9e5da' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'#ffffff', 
			'mid_link' => 		'#ffffff', 
			'mid_hover' => 		'rgba(255,255,255,0.6)', 
			'mid_bg' => 		'#92b955', 
			'mid_bg_scroll' => 	'#92b955', 
			'mid_border' => 	'rgba(215,201,164,0.2)', 
			'bot_color' => 		'#ffffff', 
			'bot_link' => 		'#ffffff', 
			'bot_hover' => 		'rgba(255,255,255,0.6)', 
			'bot_bg' => 		'#92b955', 
			'bot_bg_scroll' => 	'#ffffff', 
			'bot_border' => 	'rgba(215,201,164,0.2)'
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'#ffffff', 
			'title_link_hover' => 		'rgba(255,255,255,0.6)', 
			'title_link_current' => 	'#ffffff', 
			'title_link_subtitle' => 	'rgba(255,255,255,0.5)', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(215,201,164,0.2)', 
			'dropdown_text' => 			'#ffffff', 
			'dropdown_bg' => 			'#8d8170', 
			'dropdown_border' => 		'rgba(255,255,255,0)', 
			'dropdown_link' => 			'rgba(255,255,255,0.8)', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_subtitle' => 'rgba(255,255,255,0.5)', 
			'dropdown_link_highlight' => '#9c8c76', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'#ffffff', 
			'link' => 					'#ffffff', 
			'hover' => 					'#cdba9e', 
			'bg' => 					'#373333', 
			'border' => 				'rgba(255,255,255,0)', 
			'title_link' => 			'#cdba9e', 
			'title_link_hover' => 		'#ffffff', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(215,201,164,0.6)', 
			'dropdown_bg' => 			'#8d8170', 
			'dropdown_border' => 		'rgba(255,255,255,0)', 
			'dropdown_link' => 			'rgba(255,255,255,0.8)', 
			'dropdown_link_hover' => 	'#ffffff', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'rgba(255,255,255,0.5)', 
			'link' => 		'rgba(255,255,255,0.8)', 
			'hover' => 		'#ffffff', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#373333', 
			'alternate' => 	'#cdba9e', 
			'border' => 	'rgba(255,255,255,0.1)' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'#ffffff', 
			'link' => 		'#ffffff', 
			'hover' => 		'rgba(255,255,255,0.7)', 
			'heading' => 	'#ffffff', 
			'bg' => 		'rgba(255,255,255,0.7)', 
			'alternate' => 	'#ffffff', 
			'border' => 	'rgba(255,255,255,0.2)' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'rgba(255,255,255,0.5)', 
			'link' => 		'#ffffff', 
			'hover' => 		'rgba(255,255,255,0.3)', 
			'heading' => 	'rgba(255,255,255,0.8)', 
			'bg' => 		'#93846f', 
			'alternate' => 	'#92b955', 
			'border' => 	'rgba(228,228,228,0.1)' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'rgba(255,255,255,0.4)', 
			'link' => 		'#ffffff', 
			'hover' => 		'#e96b61', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#d14f42', 
			'alternate' => 	'#d14f42', 
			'border' => 	'#e4e4e4' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('green_farm_settings_element_defaults')) {

function green_farm_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'green-farm' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'green-farm' . '_social_icons' => array( 
				'cmsmasters-icon-linkedin|#|' . esc_html__('Linkedin', 'green-farm') . '|true||', 
				'cmsmasters-icon-facebook|#|' . esc_html__('Facebook', 'green-farm') . '|true||', 
				'cmsmasters-icon-gplus|#|' . esc_html__('Google', 'green-farm') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'green-farm') . '|true||', 
				'cmsmasters-icon-skype|#|' . esc_html__('Skype', 'green-farm') . '|true||' 
			) 
		), 
		'lightbox' => array( 
			'green-farm' . '_ilightbox_skin' => 					'dark', 
			'green-farm' . '_ilightbox_path' => 					'vertical', 
			'green-farm' . '_ilightbox_infinite' => 				0, 
			'green-farm' . '_ilightbox_aspect_ratio' => 			1, 
			'green-farm' . '_ilightbox_mobile_optimizer' => 		1, 
			'green-farm' . '_ilightbox_max_scale' => 				1, 
			'green-farm' . '_ilightbox_min_scale' => 				0.2, 
			'green-farm' . '_ilightbox_inner_toolbar' => 			0, 
			'green-farm' . '_ilightbox_smart_recognition' => 		0, 
			'green-farm' . '_ilightbox_fullscreen_one_slide' => 	0, 
			'green-farm' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'green-farm' . '_ilightbox_controls_toolbar' => 		1, 
			'green-farm' . '_ilightbox_controls_arrows' => 		0, 
			'green-farm' . '_ilightbox_controls_fullscreen' => 	1, 
			'green-farm' . '_ilightbox_controls_thumbnail' => 	1, 
			'green-farm' . '_ilightbox_controls_keyboard' => 		1, 
			'green-farm' . '_ilightbox_controls_mousewheel' => 	1, 
			'green-farm' . '_ilightbox_controls_swipe' => 		1, 
			'green-farm' . '_ilightbox_controls_slideshow' => 	0 
		), 
		'sitemap' => array( 
			'green-farm' . '_sitemap_nav' => 			1, 
			'green-farm' . '_sitemap_categs' => 		1, 
			'green-farm' . '_sitemap_tags' => 		1, 
			'green-farm' . '_sitemap_month' => 		1, 
			'green-farm' . '_sitemap_pj_categs' => 	1, 
			'green-farm' . '_sitemap_pj_tags' => 		1 
		), 
		'error' => array( 
			'green-farm' . '_error_color' => 				'#292929', 
			'green-farm' . '_error_bg_color' => 			'#fcfcfc', 
			'green-farm' . '_error_bg_img_enable' => 		0, 
			'green-farm' . '_error_bg_image' => 			'', 
			'green-farm' . '_error_bg_rep' => 			'no-repeat', 
			'green-farm' . '_error_bg_pos' => 			'top center', 
			'green-farm' . '_error_bg_att' => 			'scroll', 
			'green-farm' . '_error_bg_size' => 			'cover', 
			'green-farm' . '_error_search' => 			1, 
			'green-farm' . '_error_sitemap_button' => 	1, 
			'green-farm' . '_error_sitemap_link' => 		'' 
		), 
		'code' => array( 
			'green-farm' . '_custom_css' => 			'', 
			'green-farm' . '_custom_js' => 			'', 
			'green-farm' . '_gmap_api_key' => 		'', 
			'green-farm' . '_api_key' => 				'', 
			'green-farm' . '_api_secret' => 			'', 
			'green-farm' . '_access_token' => 		'', 
			'green-farm' . '_access_token_secret' => 	'' 
		), 
		'recaptcha' => array( 
			'green-farm' . '_recaptcha_public_key' => 	'', 
			'green-farm' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('green_farm_settings_single_defaults')) {

function green_farm_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'green-farm' . '_blog_post_layout' => 		'r_sidebar', 
			'green-farm' . '_blog_post_title' => 			1, 
			'green-farm' . '_blog_post_date' => 			1, 
			'green-farm' . '_blog_post_cat' => 			1, 
			'green-farm' . '_blog_post_author' => 		1, 
			'green-farm' . '_blog_post_comment' => 		1, 
			'green-farm' . '_blog_post_tag' => 			1, 
			'green-farm' . '_blog_post_like' => 			1, 
			'green-farm' . '_blog_post_nav_box' => 		1, 
			'green-farm' . '_blog_post_nav_order_cat' => 	0, 
			'green-farm' . '_blog_post_share_box' => 		1, 
			'green-farm' . '_blog_post_author_box' => 	1, 
			'green-farm' . '_blog_more_posts_box' => 		'popular', 
			'green-farm' . '_blog_more_posts_count' => 	'3', 
			'green-farm' . '_blog_more_posts_pause' => 	'0' 
		), 
		'project' => array( 
			'green-farm' . '_portfolio_project_title' => 			1, 
			'green-farm' . '_portfolio_project_details_title' => 	esc_html__('Project details', 'green-farm'), 
			'green-farm' . '_portfolio_project_date' => 			1, 
			'green-farm' . '_portfolio_project_cat' => 			1, 
			'green-farm' . '_portfolio_project_author' => 		1, 
			'green-farm' . '_portfolio_project_comment' => 		1, 
			'green-farm' . '_portfolio_project_tag' => 			0, 
			'green-farm' . '_portfolio_project_like' => 			1, 
			'green-farm' . '_portfolio_project_link' => 			0, 
			'green-farm' . '_portfolio_project_share_box' => 		1, 
			'green-farm' . '_portfolio_project_nav_box' => 		1, 
			'green-farm' . '_portfolio_project_nav_order_cat' => 	0, 
			'green-farm' . '_portfolio_project_author_box' => 	0, 
			'green-farm' . '_portfolio_more_projects_box' => 		'popular', 
			'green-farm' . '_portfolio_more_projects_count' => 	'4', 
			'green-farm' . '_portfolio_more_projects_pause' => 	'0', 
			'green-farm' . '_portfolio_project_slug' => 			'project', 
			'green-farm' . '_portfolio_pj_categs_slug' => 		'pj-categs', 
			'green-farm' . '_portfolio_pj_tags_slug' => 			'pj-tags' 
		), 
		'profile' => array( 
			'green-farm' . '_profile_post_title' => 			1, 
			'green-farm' . '_profile_post_details_title' => 	esc_html__('Profile details', 'green-farm'), 
			'green-farm' . '_profile_post_cat' => 			1, 
			'green-farm' . '_profile_post_comment' => 		1, 
			'green-farm' . '_profile_post_like' => 			1, 
			'green-farm' . '_profile_post_nav_box' => 		1, 
			'green-farm' . '_profile_post_nav_order_cat' => 	0, 
			'green-farm' . '_profile_post_share_box' => 		0, 
			'green-farm' . '_profile_post_slug' => 			'profile', 
			'green-farm' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('green_farm_project_puzzle_proportion')) {

function green_farm_project_puzzle_proportion() {
	return 1;
}

}



/* Theme Image Thumbnails Size */
if (!function_exists('green_farm_get_image_thumbnail_list')) {

function green_farm_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		70, 
			'height' => 	70, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		300, 
			'height' => 	300, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'green-farm') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	420, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'green-farm') 
		), 
		'cmsmasters-project-grid-thumb' => array( 
			'width' => 		360, 
			'height' => 	360, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Grid', 'green-farm') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		580, 
			'height' => 	580, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project', 'green-farm') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Project', 'green-farm') 
		), 
		'post-thumbnail' => array( 
			'width' => 		860, 
			'height' => 	500, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'green-farm') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		860, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'green-farm') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	650, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'green-farm') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	700, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Project Full', 'green-farm') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'green-farm') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('green_farm_project_labels')) {

function green_farm_project_labels() {
	return array( 
		'name' => 					esc_html__('Projects', 'green-farm'), 
		'singular_name' => 			esc_html__('Project', 'green-farm'), 
		'menu_name' => 				esc_html__('Projects', 'green-farm'), 
		'all_items' => 				esc_html__('All Projects', 'green-farm'), 
		'add_new' => 				esc_html__('Add New', 'green-farm'), 
		'add_new_item' => 			esc_html__('Add New Project', 'green-farm'), 
		'edit_item' => 				esc_html__('Edit Project', 'green-farm'), 
		'new_item' => 				esc_html__('New Project', 'green-farm'), 
		'view_item' => 				esc_html__('View Project', 'green-farm'), 
		'search_items' => 			esc_html__('Search Projects', 'green-farm'), 
		'not_found' => 				esc_html__('No projects found', 'green-farm'), 
		'not_found_in_trash' => 	esc_html__('No projects found in Trash', 'green-farm') 
	);
}

}

// add_filter('cmsmasters_project_labels_filter', 'green_farm_project_labels');


if (!function_exists('green_farm_pj_categs_labels')) {

function green_farm_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Project Categories', 'green-farm'), 
		'singular_name' => 			esc_html__('Project Category', 'green-farm') 
	);
}

}

// add_filter('cmsmasters_pj_categs_labels_filter', 'green_farm_pj_categs_labels');


if (!function_exists('green_farm_pj_tags_labels')) {

function green_farm_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Project Tags', 'green-farm'), 
		'singular_name' => 			esc_html__('Project Tag', 'green-farm') 
	);
}

}

// add_filter('cmsmasters_pj_tags_labels_filter', 'green_farm_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('green_farm_profile_labels')) {

function green_farm_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'green-farm'), 
		'singular_name' => 			esc_html__('Profiles', 'green-farm'), 
		'menu_name' => 				esc_html__('Profiles', 'green-farm'), 
		'all_items' => 				esc_html__('All Profiles', 'green-farm'), 
		'add_new' => 				esc_html__('Add New', 'green-farm'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'green-farm'), 
		'edit_item' => 				esc_html__('Edit Profile', 'green-farm'), 
		'new_item' => 				esc_html__('New Profile', 'green-farm'), 
		'view_item' => 				esc_html__('View Profile', 'green-farm'), 
		'search_items' => 			esc_html__('Search Profiles', 'green-farm'), 
		'not_found' => 				esc_html__('No Profiles found', 'green-farm'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'green-farm') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'green_farm_profile_labels');


if (!function_exists('green_farm_pl_categs_labels')) {

function green_farm_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'green-farm'), 
		'singular_name' => 			esc_html__('Profile Category', 'green-farm') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'green_farm_pl_categs_labels');

