<?php
/* Display a notice that can be dismissed */
add_action('admin_notices', 'aa_admin_notice');
function aa_admin_notice() {
	global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message
	if ( ! get_user_meta($user_id, 'aa_ignore_notice') ) {
        echo '<div class="updated"><p>'; 
        printf(__('Grazie per avere installato Amministrazione Aperta!<br/>Per la gestione dei documenti richiesti dal D.lgs. 33 dai un\'occhiata a <a href="http://wordpress.org/plugins/amministrazione-trasparente/" target="_blank">Amministrazione Trasparente</a> | <a href="%1$s">Nascondi</a>'), '?aa_nag_ignore=0');
        echo "</p></div>";
	} */
}
add_action('admin_init', 'aa_nag_ignore');
function aa_nag_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['aa_nag_ignore']) && '0' == $_GET['aa_nag_ignore'] ) {
             add_user_meta($user_id, 'aa_ignore_notice', 'true', true);
	}
}
?>