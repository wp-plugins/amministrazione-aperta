<?php

/* =========== SHORTCODE ============ */

function aa_shortcode1($atts)
{
	extract(shortcode_atts(array(
		'anni' => '1',
		'height' => '300px;',
		'width' => '100%;'),
		$atts
	));
	
	ob_start();
	include(plugin_dir_path(__FILE__) . 'shortcode1.php');
	$atshortcode = ob_get_clean();
	
	return $atshortcode;
}
add_shortcode('aa', 'aa_shortcode1');

?>