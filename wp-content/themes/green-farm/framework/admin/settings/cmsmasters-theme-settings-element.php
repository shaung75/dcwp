<?php 
/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version 	1.0.8
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function green_farm_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'green-farm');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'green-farm');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'green-farm');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'green-farm');
	$tabs['error'] = esc_attr__('404', 'green-farm');
	$tabs['code'] = esc_attr__('Custom Codes', 'green-farm');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'green-farm');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function green_farm_options_element_sections() {
	$tab = green_farm_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'green-farm');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'green-farm');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'green-farm');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'green-farm');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'green-farm');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'green-farm');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'green-farm');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function green_farm_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = green_farm_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = green_farm_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'green-farm' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'green-farm'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['green-farm' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'green-farm' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'green-farm'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['green-farm' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'green-farm'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'green-farm') . '|dark', 
				esc_html__('Light', 'green-farm') . '|light', 
				esc_html__('Mac', 'green-farm') . '|mac', 
				esc_html__('Metro Black', 'green-farm') . '|metro-black', 
				esc_html__('Metro White', 'green-farm') . '|metro-white', 
				esc_html__('Parade', 'green-farm') . '|parade', 
				esc_html__('Smooth', 'green-farm') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'green-farm'), 
			'desc' => esc_html__('Sets path for switching windows', 'green-farm'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'green-farm') . '|vertical', 
				esc_html__('Horizontal', 'green-farm') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'green-farm'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'green-farm'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'green-farm'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'green-farm'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'green-farm'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'green-farm'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'green-farm'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'green-farm'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'green-farm'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'green-farm'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'green-farm'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'green-farm'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'green-farm') . '|center', 
				esc_html__('Fit', 'green-farm') . '|fit', 
				esc_html__('Fill', 'green-farm') . '|fill', 
				esc_html__('Stretch', 'green-farm') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'green-farm'), 
			'desc' => esc_html__('Sets buttons be available or not', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'green-farm'), 
			'desc' => esc_html__('Enable the arrow buttons', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'green-farm'), 
			'desc' => esc_html__('Sets the fullscreen button', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'green-farm'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'green-farm'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'green-farm'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'green-farm'), 
			'desc' => esc_html__('Sets the swipe navigation', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'green-farm' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'green-farm'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'green-farm' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'green-farm' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'green-farm' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'green-farm' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'green-farm' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'green-farm' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_color', 
			'title' => esc_html__('Text Color', 'green-farm'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['green-farm' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'green-farm'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['green-farm' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'green-farm'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'green-farm'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['green-farm' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'green-farm') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'green-farm') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'green-farm') . '|repeat-y', 
				esc_html__('Repeat', 'green-farm') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'green-farm'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['green-farm' . '_error_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'green-farm') . '|top left', 
				esc_html__('Top Center', 'green-farm') . '|top center', 
				esc_html__('Top Right', 'green-farm') . '|top right', 
				esc_html__('Center Left', 'green-farm') . '|center left', 
				esc_html__('Center Center', 'green-farm') . '|center center', 
				esc_html__('Center Right', 'green-farm') . '|center right', 
				esc_html__('Bottom Left', 'green-farm') . '|bottom left', 
				esc_html__('Bottom Center', 'green-farm') . '|bottom center', 
				esc_html__('Bottom Right', 'green-farm') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'green-farm') . '|scroll', 
				esc_html__('Fixed', 'green-farm') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'green-farm') . '|auto', 
				esc_html__('Cover', 'green-farm') . '|cover', 
				esc_html__('Contain', 'green-farm') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_search', 
			'title' => esc_html__('Search Line', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'green-farm' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'green-farm' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'green-farm'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['green-farm' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'green-farm' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'green-farm'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['green-farm' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'green-farm' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'green-farm' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'green-farm' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_api_secret'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'green-farm' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_access_token'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'green-farm' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_access_token_secret'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'green-farm' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'green-farm' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

