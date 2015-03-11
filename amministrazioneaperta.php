<?php
/*
Plugin Name: Amministrazione Aperta
Plugin URI: http://wpgov.it/soluzioni/amministrazione-aperta/
Description: Software per la pubblicazione di concessioni (sovvenzioni, contributi, sussidi e vantaggi economici) e incarichi, anche in formato open data, come richiesto dal D.Lgs 33/2013.
Version: 3.4.1
Author: Marco Milesi
Author Email: milesimarco@outlook.com
Author URI: http://marcomilesi.ml
License:
Copyright 2013 Marco Milesi (milesimarco@outlook.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

add_action('init', 'aa_register_post_types');
function aa_register_post_types()
{
    include(plugin_dir_path(__FILE__) . 'cptypes.php');

}
add_action('admin_init', 'aa_register_post_fields');
function aa_register_post_fields()
{
    update_option( 'aa_version_number', '3.4.1' );
    include(plugin_dir_path(__FILE__) . 'fields_spese.php');
    include(plugin_dir_path(__FILE__) . 'fields_incarichi.php');

}

if(!(function_exists('wpgov_register_taxonomy_areesettori'))){
add_action( 'init', 'wpgov_register_taxonomy_areesettori' );


    function wpgov_register_taxonomy_areesettori() {

        $labels = array(
            'name' => _x( 'Uffici - Settori - Centri di costo', 'areesettori' ),
            'singular_name' => _x( 'Settore - Centro di costo', 'areesettori' ),
            'search_items' => _x( 'Cerca in Settori - Centri di costo', 'areesettori' ),
            'popular_items' => _x( 'Settori - Centri di costo Più usati', 'areesettori' ),
            'all_items' => _x( 'Tutti i Centri di costo', 'areesettori' ),
            'parent_item' => _x( 'Parent Settore - Centro di costo', 'areesettori' ),
            'parent_item_colon' => _x( 'Parent Settore - Centro di costo:', 'areesettori' ),
            'edit_item' => _x( 'Modifica Settore - Centro di costo', 'areesettori' ),
            'update_item' => _x( 'Aggiorna Settore - Centro di costo', 'areesettori' ),
            'add_new_item' => _x( 'Aggiungi Nuovo Settore - Centro di costo', 'areesettori' ),
            'new_item_name' => _x( 'Nuovo Settore - Centro di costo', 'areesettori' ),
            'separate_items_with_commas' => _x( 'Separate settori - centri di costo with commas', 'areesettori' ),
            'add_or_remove_items' => _x( 'Add or remove settori - centri di costo', 'areesettori' ),
            'choose_from_most_used' => _x( 'Choose from the most used settori - centri di costo', 'areesettori' ),
            'menu_name' => _x( 'Uffici & Settori', 'areesettori' ),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_in_nav_menus' => false,
            'show_ui' => true,
            'show_tagcloud' => false,
            'show_admin_column' => true,
            'hierarchical' => true,

            'rewrite' => true,
            'query_var' => true
        );
        register_taxonomy( 'areesettori', array('incarico', 'spesa',  'avcp', 'amm-trasparente'), $args );
    }
}
/* =========== TITOLO HCK =========== */
function aa_default_title($title)
{
    $screen = get_current_screen();
    if ('spesa' == $screen->post_type) {
        $title = 'Inserire la ragione del contributo o concessione';
    } else if ('incarico' == $screen->post_type) {
        $title = 'Inserire la ragione dell\'incarico o Progetto';
    }
    return $title;
}
add_filter('enter_title_here', 'aa_default_title');
/* =========== SHORTCODE ============ */

function ammap_func($atts)
{
extract(shortcode_atts(array(
      'anno' => 'all',
      'grafico' => '0',
      'incarico' => '0', // 0= tutti i tipi di incarico || 1= incarichi ai propri dipendenti || 2= incarichi a dipendenti altra pa || 3= incarichi esterni
      'tipo' => 'spesa' //opzione: spesa/incaricho ---> DEFAULT: spesa
   ), $atts));
ob_start();
include(plugin_dir_path(__FILE__) . 'tablegen.php');
$atshortcode = ob_get_clean();
return $atshortcode;
}
add_shortcode('ammap', 'ammap_func');
add_shortcode('aa', 'ammap_func');

/* =========== META BOX ============ */
include(plugin_dir_path(__FILE__) . 'meta-box-class/my-meta-box-class.php');

/* =========== Visualizzazione Singola */
add_action('template_redirect', 'aa_job_cpt_template');
function aa_job_cpt_template()
{
    include(plugin_dir_path(__FILE__) . 'single_hacks.php');
}

/* =========== Genera Impostazioni e Informazioni ============ */
if ( is_admin() ){ // admin actions
    add_action('admin_init', 'ammap_settings');
} else {
  // non-admin enqueues, actions, and filters
}

function ammap_settings()
{
register_setting( 'aa_options_group', 'aa_disabilita_visauomatica_allegati', 'intval');
}


function ammap_getJs(){
    wp_register_script( 'ammap_functions', plugins_url('includes/ammap.js'));
    wp_enqueue_script( 'ammap_functions');
}
add_filter('admin_footer', 'ammap_getJs');

add_action( 'init', 'AA_ADMIN_LOAD');
function AA_ADMIN_LOAD () {
    require_once(plugin_dir_path(__FILE__) . 'admin-messages.php');
    //require_once(plugin_dir_path(__FILE__) . 'opendata.php');
    //require_once(plugin_dir_path(__FILE__) . 'open_charts/shortcodes.php');
}

require_once(plugin_dir_path(__FILE__) . 'wpgov/load.php'); //Caricatore impostazioni wpgov.it
?>
