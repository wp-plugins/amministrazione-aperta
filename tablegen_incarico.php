<?php

$post_taxonomy = get_the_terms( get_the_ID(), 'tipo_incarico' );

if ($incarico != 0) {
    if ($incarico == 1) {
        if(!(has_term( 'Incarichi conferiti o autorizzati ai propri dipendenti', 'tipo_incarico' ))) { return; }
    } else if ($incarico == 2) {
        if(!(has_term( 'Incarichi conferiti a dipendenti di altra Amministrazione', 'tipo_incarico' ))) { return; }
    } else if ($incarico == 3) {
        if(!(has_term( 'Incarichi conferiti a soggetti estranei alla Pubblica Amministrazione', 'tipo_incarico' ))) { return; }
    } else {
        echo 'Impossibile valorizzare il campo <strong>$incarico</strong>';
        die;
    }
}

$yearToCompareInizio = date("Y",strtotime(str_replace('/', '-', get_post_meta(get_the_ID(), 'ammap_data_inizio', true))));
$yearToCompareFine = date("Y",strtotime(str_replace('/', '-', get_post_meta(get_the_ID(), 'ammap_data_fine', true))));
    if($anno != "all") {
        if ($yearToCompareInizio != $anno && $yearToCompareFine != $anno) {
            return;
        }
    }
?>

        <tr>
            <td colspan="2"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_beneficiario', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">€ <?php echo get_post_meta(get_the_ID(), 'ammap_importo_previsto', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">€ <?php echo get_post_meta(get_the_ID(), 'ammap_importo', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo date("d/m/Y", strtotime(get_post_meta(get_the_ID(), 'ammap_data_inizio', true))); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo date("d/m/Y", strtotime(get_post_meta(get_the_ID(), 'ammap_data_fine', true))); ?></a></td>
       </tr>
