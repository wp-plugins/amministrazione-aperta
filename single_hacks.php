<?php
    global $wp, $wp_query;
    if (isset($wp->query_vars['post_type']) && $wp->query_vars['post_type'] == 'spesa') {
        if (have_posts()) {
            add_filter('the_content', 'spesa_job_cpt_template_filter');
        } else {
            $wp_query->is_404 = true;
        }
    } else if (isset($wp->query_vars['post_type']) && $wp->query_vars['post_type'] == 'incarico') {
        if (have_posts()) {
            add_filter('the_content', 'incarico_job_cpt_template_filter');
        } else {
            $wp_query->is_404 = true;
        }
    }
function spesa_job_cpt_template_filter($content)
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
}
function incarico_job_cpt_template_filter($content)
{
    global $wp_query;
    $jobID = $wp_query->post->ID;
    echo get_post_meta(get_the_ID(), 'ammap_wysiwyg', true) . '<br/>';
    echo '<strong>Soggetto Percettore: </strong> ' . get_post_meta(get_the_ID(), 'ammap_beneficiario', true) . '<br/>';
    echo '<strong>Compenso Lordo Previsto: </strong>€ ' . get_post_meta(get_the_ID(), 'ammap_importo_previsto', true) . '<br/>';
    echo '<strong>Compenso Lordo Erogato: </strong>€ ' . get_post_meta(get_the_ID(), 'ammap_importo', true) . '<br/>';
    echo '<strong>Data inizio: </strong>' . get_post_meta(get_the_ID(), 'ammap_data_inizio', true) . '<br/>';
    echo '<strong>Data fine: </strong>' . get_post_meta(get_the_ID(), 'ammap_data_fine', true) . '<br/>';
}
?>
