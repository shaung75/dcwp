<?php 
/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version 	1.0.8
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function green_farm_options_general_tabs() {
	$cmsmasters_option = green_farm_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'green-farm');
	
	if ($cmsmasters_option['green-farm' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'green-farm');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'green-farm');
	}
	
	$tabs['header'] = esc_attr__('Header', 'green-farm');
	$tabs['content'] = esc_attr__('Content', 'green-farm');
	$tabs['footer'] = esc_attr__('Footer', 'green-farm');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function green_farm_options_general_sections() {
	$tab = green_farm_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'green-farm');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'green-farm');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'green-farm');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'green-farm');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'green-farm');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'green-farm');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function green_farm_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = green_farm_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = green_farm_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'green-farm') . '|liquid', 
				esc_html__('Boxed', 'green-farm') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'green-farm') . '|image', 
				esc_html__('Text', 'green-farm') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'green-farm'), 
			'desc' => esc_html__('Choose your website logo image.', 'green-farm'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['green-farm' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'green-farm'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'green-farm'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['green-farm' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'green-farm'), 
			'desc' => esc_html__('enable', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'green-farm'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['green-farm' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'green-farm' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'green-farm'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['green-farm' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'green-farm' . '_bg_col', 
			'title' => esc_html__('Background Color', 'green-farm'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['green-farm' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'green-farm' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'green-farm' . '_bg_img', 
			'title' => esc_html__('Background Image', 'green-farm'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'green-farm'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['green-farm' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'green-farm' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'green-farm') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'green-farm') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'green-farm') . '|repeat-y', 
				esc_html__('Repeat', 'green-farm') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'green-farm' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'green-farm'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['green-farm' . '_bg_pos'], 
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
			'section' => 'bg_section', 
			'id' => 'green-farm' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'green-farm') . '|scroll', 
				esc_html__('Fixed', 'green-farm') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'green-farm' . '_bg_size', 
			'title' => esc_html__('Background Size', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'green-farm') . '|auto', 
				esc_html__('Cover', 'green-farm') . '|cover', 
				esc_html__('Contain', 'green-farm') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'green-farm' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'green-farm'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => green_farm_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'green-farm'), 
			'desc' => esc_html__('enable', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content by Default', 'green-farm'), 
			'desc' => esc_html__('enable', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'green-farm'), 
			'desc' => esc_html__('pixels', 'green-farm'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['green-farm' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'green-farm'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'green-farm') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['green-farm' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'green-farm') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'green-farm') . '|social', 
				esc_html__('Top Line Navigation', 'green-farm') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'green-farm') . '|default', 
				esc_html__('Compact Style Left Navigation', 'green-farm') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'green-farm') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'green-farm') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'green-farm'), 
			'desc' => esc_html__('pixels', 'green-farm'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['green-farm' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'green-farm'), 
			'desc' => esc_html__('pixels', 'green-farm'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['green-farm' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_search', 
			'title' => esc_html__('Header Search', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'green-farm') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'green-farm') . '|social', 
				esc_html__('Header Custom HTML', 'green-farm') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'green-farm' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'green-farm'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'green-farm') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['green-farm' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['green-farm' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['green-farm' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['green-farm' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'green-farm'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['green-farm' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'green-farm') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'green-farm') . '|left', 
				esc_html__('Right', 'green-farm') . '|right', 
				esc_html__('Center', 'green-farm') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'green-farm'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['green-farm' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'green-farm'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'green-farm'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['green-farm' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'green-farm') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'green-farm') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'green-farm') . '|repeat-y', 
				esc_html__('Repeat', 'green-farm') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'green-farm') . '|scroll', 
				esc_html__('Fixed', 'green-farm') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'green-farm') . '|auto', 
				esc_html__('Cover', 'green-farm') . '|cover', 
				esc_html__('Contain', 'green-farm') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'green-farm'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['green-farm' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'green-farm'), 
			'desc' => esc_html__('pixels', 'green-farm'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['green-farm' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'green-farm'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['green-farm' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'green-farm' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'green-farm'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['green-farm' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'green-farm'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['green-farm' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'green-farm') . '|default', 
				esc_html__('Small', 'green-farm') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'green-farm'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['green-farm' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'green-farm') . '|none', 
				esc_html__('Footer Navigation', 'green-farm') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'green-farm') . '|social', 
				esc_html__('Custom HTML', 'green-farm') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'green-farm'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'green-farm'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['green-farm' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'green-farm'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'green-farm'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['green-farm' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'green-farm'), 
			'desc' => esc_html__('show', 'green-farm'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['green-farm' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'green-farm'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'green-farm') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['green-farm' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'green-farm' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'green-farm'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['green-farm' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);	
}

