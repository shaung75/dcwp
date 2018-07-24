<?php 
/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version		1.0.8
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function green_farm_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'green-farm');
	$tabs['export'] = esc_attr__('Export', 'green-farm');
	
	
	return $tabs;
}


function green_farm_options_demo_sections() {
	$tab = green_farm_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'green-farm');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'green-farm');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function green_farm_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = green_farm_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => 'green-farm' . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'green-farm'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'green-farm') . (CMSMASTERS_THEME_STYLE_COMPATIBILITY ? '<span class="descr_note">' . esc_html__("Please note that when importing theme settings, these settings will be applied to the appropriate Theme Style (with the same name).", 'green-farm') . '<br />' . esc_html__("To see these settings applied, please enable appropriate", 'green-farm') . ' <a href="' . esc_url(admin_url('admin.php?page=cmsmasters-settings&tab=theme_style')) . '">' . esc_html__("Theme Style", 'green-farm') . '</a>.</span>' : ''), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => 'green-farm' . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'green-farm'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file.", 'green-farm') . (CMSMASTERS_THEME_STYLE_COMPATIBILITY ? '<span class="descr_note">' . esc_html__("Please note, that when exporting theme settings, you will export settings for the currently active Theme Style.", 'green-farm') . '<br />' . esc_html__("Theme Style can be set", 'green-farm') . ' <a href="' . esc_url(admin_url('admin.php?page=cmsmasters-settings&tab=theme_style')) . '">' . esc_html__("here", 'green-farm') . '</a>.</span>' : ''), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'green-farm'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

