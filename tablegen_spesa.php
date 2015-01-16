<?php
$a = get_post_meta(get_the_ID(), 'ammap_data', true);
$b = str_replace( ',', '', $a );
$a = $b;
$yearToCompare = date("Y", strtotime($a));
    if ($yearToCompare != $anno && $anno != "all") {
        return;
    }
?>

        <tr>
            <td colspan="2"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">€ <?php echo get_post_meta(get_the_ID(), 'ammap_importo', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_beneficiario', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_fiscale', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_norma', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_assegnazione', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_responsabile', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_determina', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo date("d/m/Y", strtotime($a)); ?></a></td>
       </tr>
