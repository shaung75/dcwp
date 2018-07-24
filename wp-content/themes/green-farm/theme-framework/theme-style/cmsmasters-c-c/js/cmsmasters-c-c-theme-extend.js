/**
 * @package 	WordPress
 * @subpackage 	Green Farm
 * @version		1.0.8
 * 
 * Theme Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */


/**
 * Blog Extend
 */
var cmsmasters_blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['puzzle'] = cmsmasters_theme_shortcodes.blog_field_layout_mode_puzzle;
		
		
		cmsmasters_blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else if (id === 'filter_text') { 
		delete cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		cmsmasters_blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = cmsmasters_blog_new_fields;



/**
 * Portfolio Extend
 */
var cmsmasters_portfolio_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_portfolio.fields) {
	if (id === 'columns') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = '3';
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_grid') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,excerpt,categories,rollover,more';
		
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises']['more'] = cmsmasters_shortcodes.choice_more;
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_puzzle') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,categories,comments,likes';
		
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises']['rollover'];
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'gap') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['depend'] = 'layout:puzzle';
		
		
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'filter_text') { 
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else {
		cmsmasters_portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_portfolio.fields = cmsmasters_portfolio_new_fields;



/**
 * Quotes Extend
 */
var cmsmasters_quotes_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_quotes.fields) {
	if (id === 'mode') {
		cmsmasters_quotes_new_fields['type'] = { 
			type : 		'radio', 
			title : 	cmsmasters_theme_shortcodes.quotes_field_slider_type_title, 
			descr : 	cmsmasters_theme_shortcodes.quotes_field_slider_type_descr, 
			def : 		'box', 
			required : 	true, 
			width : 	'half', 
			choises : { 
						'box' : 	cmsmasters_theme_shortcodes.quotes_field_type_choice_box, 
						'center' : 	cmsmasters_theme_shortcodes.quotes_field_type_choice_center 
			}, 
			depend : 	'mode:slider' 
		};
		
		
		cmsmasters_quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
	} else {
		cmsmasters_quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_quotes.fields = cmsmasters_quotes_new_fields;



/**
 * Posts Slider Extend
 */
var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'columns') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = '3';
		
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];  
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'amount') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'blog_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = 'title,excerpt,date,categories,author,comments,likes,more';
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'portfolio_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = 'title,excerpt,categories,more';
		
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises']['more'] = cmsmasters_shortcodes.choice_more;
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;



/**
 * Featured Block Extend
 */
var cmsmasters_featured_block_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_featured_block.fields) {
	if (id === 'block_link') {
		delete cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
	} else if (id === 'block_link_target') {
		delete cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
	} else if (id === 'top_padding') {
		cmsmasters_featured_block_new_fields['link'] = { 
			type : 		'input', 
			title : 	cmsmasters_theme_shortcodes.featured_block_link, 
			descr : 	cmsmasters_theme_shortcodes.featured_block_link_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'full' 
		};
		
		
		cmsmasters_featured_block_new_fields['target'] = { 
			type : 		'radio', 
			title : 	cmsmasters_theme_shortcodes.featured_block_target, 
			descr : 	cmsmasters_theme_shortcodes.featured_block_target_descr, 
			def : 		'self', 
			required : 	false, 
			width : 	'half',  
			choises : { 
						'self' : 	cmsmasters_shortcodes.link_target_choice_self, 
						'blank' : 	cmsmasters_shortcodes.link_target_choice_blank 
			}, 
			depend : 	'link:!' 
		};

		
		cmsmasters_featured_block_new_fields['hover'] = { 
			type : 		'checkbox', 
			title : 	cmsmasters_theme_shortcodes.featured_block_hover, 
			descr : 	cmsmasters_theme_shortcodes.featured_block_hover_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'true' : 	cmsmasters_shortcodes.choice_enable
			} 
		};
		
		cmsmasters_featured_block_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
	} else {
		cmsmasters_featured_block_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_block.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_featured_block.fields = cmsmasters_featured_block_new_fields;
