<?php
/*
Plugin Name: Amministrazione Aperta
Plugin URI: http://wordpress.org/extend/plugins/amministrazione-aperta
Description: Soluzione completa per la pubblicazione di sovvenzioni, contributi, sussidi e vantaggi economici, anche in formato open data, come richiesto dal D.Lgs. 33/2013
Version: 2.2.1
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
add_action('init', 'register_cpt_spesa');
function register_cpt_spesa()
{
    $labels = array(
        'name' => _x('Spese', 'spesa'),
        'singular_name' => _x('Spesa', 'spesa'),
        'add_new' => _x('Nuova Spesa', 'spesa'),
        'add_new_item' => _x('Nuova Spesa', 'spesa'),
        'edit_item' => _x('Modifica Spesa', 'spesa'),
        'new_item' => _x('Nuova Spesa', 'spesa'),
        'view_item' => _x('Visualizza Spesa', 'spesa'),
        'search_items' => _x('Cerca Spesa', 'spesa'),
        'not_found' => _x('Nessun elemento trovato', 'spesa'),
        'not_found_in_trash' => _x('Nessun elemento trovato', 'spesa'),
        'parent_item_colon' => _x('Parent Spesa:', 'spesa'),
        'menu_name' => _x('Spese', 'spesa')
    );
    $args   = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'In particolare, al fine di ottemperare all’obbligo normativo, per ogni spesa documentata è richiesta la pubblicazione di informazioni relative a:
ragione sociale e dati fiscali dell’impresa beneficiaria;
importo di spesa;
la norma o il titolo a base dell’attribuzione;
l’ufficio e il funzionario o responsabile del procedimento amministrativo;
metodo e modalità per la scelta del beneficiario;
link utili a: progetto selezionato, curriculum del soggetto incaricato, contratto e capitolato della prestazione, fornitura o servizio',
        'supports' => array(
            'title'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => plugin_dir_url(__FILE__) . 'openshareicon-16x16.png',
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => false,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );
    register_post_type('spesa', $args);
}
/* =========== TITOLO HCK =========== */
function change_default_title($title)
{
    $screen = get_current_screen();
    if ('spesa' == $screen->post_type) {
        $title = 'Inserire Titolo Spesa/Progetto';
    }
    return $title;
}
add_filter('enter_title_here', 'change_default_title');
/* =========== SHORTCODE ============ */

function ammap_func($atts)
{
extract(shortcode_atts(array(
      'anno' => 'all',
   ), $atts));
ob_start();
include(plugin_dir_path(__FILE__) . 'tablegen.php');
$atshortcode = ob_get_clean();
return $atshortcode;
}
add_shortcode('ammap', 'ammap_func');
/* =========== META BOX ============ */
include(plugin_dir_path(__FILE__) . 'meta-box-class/my-meta-box-class.php');
/*
* configure your meta box
*/
$config  = array(
    'id' => 'ammap_meta_box', // meta box id, unique per meta box 
    'title' => 'Dettagli Voce', // meta box title
    'pages' => array(
        'spesa'
    ), // post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal', // where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high', // order of meta box: high (default), low; optional
    'fields' => array(), // list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false, // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);
/*
* Initiate your meta box
*/
$my_meta = new AT_Meta_Box($config);
/*
* Campi personalizzati del Plugin - Usa API terze parti
*/
$prefix  = "ammap_";
$my_meta->addText($prefix . 'beneficiario', array(
    'name' => 'Beneficiario'
));
$my_meta->addText($prefix . 'importo', array(
    'name' => 'Importo. Es. 2.000'
));
$my_meta->addText($prefix . 'fiscale', array(
    'name' => 'Dati Fiscali'
));
$my_meta->addText($prefix . 'norma', array(
    'name' => 'Norma'
));
$my_meta->addText($prefix . 'responsabile', array(
    'name' => 'Responsabile'
));
$my_meta->addText($prefix . 'determina', array(
    'name' => 'Determina'
));
$my_meta->addSelect($prefix . 'assegnazione', array(
    'Chiamata Diretta' => 'Chiamata Diretta',
    'Bando Pubblico' => 'Bando Pubblico',
	'Cottimo Fiduciario' => 'Cottimo Fiduciario',
    'Mercato Elettronico' => 'Mercato Elettronico',
    'Convenzione CONSIP' => 'Convenzione CONSIP',
	'Procedura negoziata' => 'Procedura negoziata',
    'Procedura ristretta' => 'Procedura ristretta',
    'Procedura selettiva' => 'Procedura selettiva'
), array(
    'name' => 'Modalità Assegnazione',
    'std' => array(
        'Selezionare...'
    )
));
$my_meta->addDate($prefix . 'data', array(
    'name' => 'Data'
));
//text field
$my_meta->addWysiwyg($prefix . 'wysiwyg', array(
    'name' => ' Note libere e caricamento file'
));
/*



* Don't Forget to Close up the meta box deceleration



*/
//Finish Meta Box Deceleration
$my_meta->Finish();
/* =========== Visualizzazione Singola */
add_action('template_redirect', 'ft_job_cpt_template');
function ft_job_cpt_template()
{
		global $wp, $wp_query;
		if (isset($wp->query_vars['post_type']) && $wp->query_vars['post_type'] == 'spesa') {
			if (have_posts()) {
				add_filter('the_content', 'ft_job_cpt_template_filter');
			} else {
				$wp_query->is_404 = true;
			}
		}
}
function ft_job_cpt_template_filter($content)
{
    global $wp_query;
    $jobID = $wp_query->post->ID;
	echo get_post_meta(get_the_ID(), 'ammap_wysiwyg', true) . '<br/>';
    echo '<strong>Importo: </strong>€ ' . get_post_meta(get_the_ID(), 'ammap_importo', true) . '<br/>';
    echo '<strong>Beneficiario: </strong>' . get_post_meta(get_the_ID(), 'ammap_beneficiario', true) . '<br/>';
    echo '<strong>Dati Fiscali: </strong>' . get_post_meta(get_the_ID(), 'ammap_fiscale', true) . '<br/>';
    echo '<strong>Norma: </strong>' . get_post_meta(get_the_ID(), 'ammap_norma', true) . '<br/>';
    echo '<strong>Modalità: </strong>' . get_post_meta(get_the_ID(), 'ammap_assegnazione', true) . '<br/>';
    echo '<strong>Responsabile: </strong>' . get_post_meta(get_the_ID(), 'ammap_responsabile', true) . '<br/>';
    echo '<strong>Determina: </strong>' . get_post_meta(get_the_ID(), 'ammap_determina', true) . '<br/>';
    echo '<strong>Data: </strong>' . get_post_meta(get_the_ID(), 'ammap_data', true) . '<br/>';
	
	$get_aa_disabilita_visauomatica_allegati = get_option('aa_disabilita_visauomatica_allegati');
	if ($get_aa_disabilita_visauomatica_allegati == '0') {
		echo '<strong>Documenti Allegati:</strong><br/>';
		$args        = array(
			'post_type' => 'attachment',
			'post_mime_type' => 'application/pdf,application/msword,application/zip,application/vnd.ms-excel',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => get_the_ID(),
			'orderby' => 'menu_order',
			'order' => 'desc'
		);
		$attachments = get_posts($args);
		if ($attachments) {
			foreach ($attachments as $attachment) {
				$class = "post-attachment mime-" . sanitize_title($attachment->post_mime_type);
				echo '<li class="' . $class . '"><a href="' . wp_get_attachment_url($attachment->ID) . '">';
				echo $attachment->post_title;
				echo '</a> (';
				echo _format_bytes(filesize(get_attached_file($attachment->ID)));
				echo ')</li>';
			}
		}
	}
}

function _format_bytes($a_bytes)
{
    if ($a_bytes < 1024) {
        return $a_bytes . ' B';
    } elseif ($a_bytes < 1048576) {
        return round($a_bytes / 1024, 2) . ' KB';
    } elseif ($a_bytes < 1073741824) {
        return round($a_bytes / 1048576, 2) . ' MB';
    } elseif ($a_bytes < 1099511627776) {
        return round($a_bytes / 1073741824, 2) . ' GB';
    } else {
        return round($a_bytes / 1208925819614629174706176, 2) . ' ERROR';
    }
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

function ammap_menu()
{
    add_submenu_page('edit.php?post_type=spesa', 'Impostazioni', 'Impostazioni', 'manage_options', 'ammap_credits', 'ammap_settings_menu');
}
add_action('admin_menu', 'ammap_menu');

function ammap_settings_menu()
{
	if(isset($_POST['Submit'])) {

		if(isset($_POST['aa_disabilita_visauomatica_allegati_n'])){
			update_option( 'aa_disabilita_visauomatica_allegati', '1' );
		} else {
			update_option( 'aa_disabilita_visauomatica_allegati', '0' );
		}
	}
	echo '<div class="wrap"><h2>Impostazioni & Aiuto</h2>';
	echo '<form method="post" name="options" target="_self">';
	settings_fields( 'at_option_group' );
	
	echo '<tr><td><input type="checkbox" name="aa_disabilita_visauomatica_allegati_n" ';
	$get_aa_disabilita_visauomatica_allegati = get_option('aa_disabilita_visauomatica_allegati');
	if ($get_aa_disabilita_visauomatica_allegati == '1') {
		echo 'checked=\'checked\'';
	}
	echo '/>&nbsp;Spunta questa casella per disabilitare la visualizzazione automatica degli allegati (es. se vuoi inserirli manualmente nel testo o usi un plugin per la loro visualizzazione come WP Attachments)</td></tr>
	<p class="submit"><input type="submit"  class="button-primary" name="Submit" value="Aggiorna Impostazioni" /></p>';
	
    echo '<hr><br/>Versione <b>2.2.1</b><br/>Autore: <b>Marco Milesi</b><br/Supporto & Feedback: <b><a href="http://wordpress.org/extend/plugins/amministrazione-aperta/" title="Wordpress Support" target="_blank">www.wordpress.org/extend/plugins/amministrazione-aperta</a><br/><br/><h3>Installazione</h3>Dopo avere attivato il plugin, per visualizzare le spese pubblicate è sufficiente creare una nuova pagina (es. "Amministrazione Aperta"), inserendo al suo interno il tag "<b>[ammap]</b> o [ammap anno="2013"]". Per informazioni e supporto, consultare il blog ufficiale oppure la pagina dedicata su Wordpress.org.<br/>Grazie per utilizzare Amministrazione Aperta per Wordpress!<br/>Marco';
}
?>
<?php
function presstrends_AmministrazioneAperta_plugin()
{
    // PressTrends Account API Key
    $api_key = 'abt3ep7uq9b2jzohwmefm3y5koqcsxguqx0a';
    $auth    = 'ipxnz1sg42nfklf56mc3jlcrujglxlhvj';
    // Start of Metrics
    global $wpdb;
    $data = get_transient('presstrends_cache_data');
    if (!$data || $data == '') {
        $api_base       = 'http://api.presstrends.io/index.php/api/pluginsites/update/auth/';
        $url            = $api_base . $auth . '/api/' . $api_key . '/';
        $count_posts    = wp_count_posts();
        $count_pages    = wp_count_posts('page');
        $comments_count = wp_count_comments();
        // wp_get_theme was introduced in 3.4, for compatibility with older versions, let's do a workaround for now.
        if (function_exists('wp_get_theme')) {
            $theme_data = wp_get_theme();
            $theme_name = urlencode($theme_data->Name);
        } else {
            $theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
            $theme_name = $theme_data['Name'];
        }
        $plugin_name = '&';
        foreach (get_plugins() as $plugin_info) {
            $plugin_name .= $plugin_info['Name'] . '&';
        }
        // CHANGE __FILE__ PATH IF LOCATED OUTSIDE MAIN PLUGIN FILE
        $plugin_data         = get_plugin_data(__FILE__);
        $posts_with_comments = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' AND comment_count > 0");
        $data                = array(
            'url' => stripslashes(str_replace(array(
                'http://',
                '/',
                ':'
            ), '', site_url())),
            'posts' => $count_posts->publish,
            'pages' => $count_pages->publish,
            'comments' => $comments_count->total_comments,
            'approved' => $comments_count->approved,
            'spam' => $comments_count->spam,
            'pingbacks' => $wpdb->get_var("SELECT COUNT(comment_ID) FROM $wpdb->comments WHERE comment_type = 'pingback'"),
            'post_conversion' => ($count_posts->publish > 0 && $posts_with_comments > 0) ? number_format(($posts_with_comments / $count_posts->publish) * 100, 0, '.', '') : 0,
            'theme_version' => $plugin_data['Version'],
            'theme_name' => $theme_name,
            'site_name' => str_replace(' ', '', get_bloginfo('name')),
            'plugins' => count(get_option('active_plugins')),
            'plugin' => urlencode($plugin_name),
            'wpversion' => get_bloginfo('version')
        );
        foreach ($data as $k => $v) {
            $url .= $k . '/' . $v . '/';
        }
        wp_remote_get($url);
        set_transient('presstrends_cache_data', $data, 60 * 60 * 24);
    }
}
// PressTrends WordPress Action
register_activation_hook(__FILE__, 'presstrends_AmministrazioneAperta_plugin');
add_action('admin_init', 'presstrends_AmministrazioneAperta_plugin');
include(plugin_dir_path(__FILE__) . 'admin-messages.php');
?>