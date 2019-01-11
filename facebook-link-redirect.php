<?php
/*
Plugin Name: Facebook Link Redirect
Plugin URI: http://codeconvolution.com/
description: This plugin will redirect the link from default facebook browser to phone browser
Version: 1.0
Author: Ali Nawaz
Author URI: http://codeconvolution.com/
License: GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define("PluginName", "Facebook Link Redirect");
define("Version", 1.0);
define("ADMIN_EMAIL", "alinawazdi@gmail.com");


function fb_link_wp_head_script() { global $post; ob_start(); ?>



<script>
	
	function isFacebookApp(){
		var ua = navigator.userAgent || navigator.vendor || window.opera;
		return (ua.indexOf("FBAN") > -1) || (ua.indexOf("FBAV") > -1);
	}

	if(isFacebookApp()){
		window.location.href = "intent:<?php echo get_permalink(); ?>/#Intent;scheme=http;package=com.android.chrome;end";
	}
</script>

<?php $output = ob_get_contents(); ob_get_clean(); echo $output; } add_action( 'wp_head', 'fb_link_wp_head_script' );

?>