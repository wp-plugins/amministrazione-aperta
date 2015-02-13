<?php

add_action( 'admin_menu', 'register_aa_wpgov_menu_page' );

function register_aa_wpgov_menu_page(){
    if (is_plugin_active( 'amministrazione-trasparente/amministrazionetrasparente.php' ) || is_plugin_active( 'avcp/avcp.php' )) { return; }
    add_menu_page('Impostazioni soluzioni WPGOV.IT', 'WPGov.it', 'manage_options', 'impostazioni-wpgov', 'aa_wpgov_settings', 'dashicons-share-alt', 40);
}

function aa_wpgov_settings () {
    include(plugin_dir_path(__FILE__) . 'dispatcher.php');
}
?>
