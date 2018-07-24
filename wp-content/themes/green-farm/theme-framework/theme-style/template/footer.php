<?php 
/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version		1.0.2
 * 
 * Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = green_farm_get_global_options();
?>
<div class="footer_inner">
	<div class="footer_in_inner">
		<?php 
		if (
			$cmsmasters_option['green-farm' . '_footer_type'] == 'default' && 
			$cmsmasters_option['green-farm' . '_footer_logo']
		) {
			green_farm_footer_logo($cmsmasters_option);
		}
		
		
		if (
			(
				$cmsmasters_option['green-farm' . '_footer_type'] == 'default' && 
				$cmsmasters_option['green-farm' . '_footer_html'] !== ''
			) || (
				$cmsmasters_option['green-farm' . '_footer_type'] == 'small' && 
				$cmsmasters_option['green-farm' . '_footer_additional_content'] == 'text' && 
				$cmsmasters_option['green-farm' . '_footer_html'] !== ''
			)
		) {
			echo '<div class="footer_custom_html_wrap">' . 
				'<div class="footer_custom_html">' . 
					do_shortcode(wp_kses(stripslashes($cmsmasters_option['green-farm' . '_footer_html']), 'post')) . 
				'</div>' . 
			'</div>';
		}
		
		
		if (
			has_nav_menu('footer') && 
			(
				(
					$cmsmasters_option['green-farm' . '_footer_type'] == 'default' && 
					$cmsmasters_option['green-farm' . '_footer_nav']
				) || (
					$cmsmasters_option['green-farm' . '_footer_type'] == 'small' && 
					$cmsmasters_option['green-farm' . '_footer_additional_content'] == 'nav'
				)
			)
		) {
			echo '<div class="footer_nav_wrap">' . 
				'<nav>';
				
				
				wp_nav_menu(array( 
					'theme_location' => 'footer', 
					'menu_id' => 'footer_nav', 
					'menu_class' => 'footer_nav' 
				));
				
				
				echo '</nav>' . 
			'</div>';
		}
		
		
		if (
			isset($cmsmasters_option['green-farm' . '_social_icons']) && 
			(
				(
					$cmsmasters_option['green-farm' . '_footer_type'] == 'default' && 
					$cmsmasters_option['green-farm' . '_footer_social']
				) || (
					$cmsmasters_option['green-farm' . '_footer_type'] == 'small' && 
					$cmsmasters_option['green-farm' . '_footer_additional_content'] == 'social'
				)
			)
		) {
			green_farm_social_icons();
		}
		?>
		<span class="footer_copyright copyright"><?php echo esc_html(stripslashes($cmsmasters_option['green-farm' . '_footer_copyright'])); ?></span>
	</div>
</div>