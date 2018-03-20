<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php if($metaTitle == ""){?>
<title>Daddy Cools Chilli Sauce and Snacks</title>
<link rel='shortcut icon' href='images/favicon.png' type='image/x-icon'/ >
<?php }else{?>
<title><?php echo $metaTitle;?></title>
<meta name="Keywords" content="<?php echo $metsKeyword;?>"/>
<meta name="Description" content="<?php echo $metaDescription;?>"/>
<?php }?>
<meta name="viewport" content=
"initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=no" />
<link type="text/css" rel="stylesheet" href="<?php echo $global_site_url['site_url'] ?>css/default.css" />
<script src="<?php echo $global_site_url['site_url'] ?>js/jquery-1.12.2.min.js"></script>
<script src="<?php echo $global_site_url['site_url'] ?>js/web.js"></script>
<script type="text/javascript" src="<?php echo $global_site_url['site_url'] ?>fancybox/jquery.fancybox.js"></script>
<link rel="stylesheet" href="<?php echo $global_site_url['site_url'] ?>fancybox/jquery.fancybox.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo $global_site_url['site_url'] ?>css/flexslider.css" />
<script src="<?php echo $global_site_url['site_url'] ?>js/jquery.flexslider.js"></script>

<script>
	$(document).ready(function() {
        $('.flexslider.banner').flexslider({
			controlNav: false,
    		directionNav: false		
		});
		
		$('.flexslider.prod-slider').flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 210,
			itemMargin: 5,
			minItems: 1,
			maxItems: 4,
			controlNav: false,
    		directionNav: true
		});
	
    });
</script>
<?php

$sid=session_id();
?>
</head>