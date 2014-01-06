<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'js/jquery.dataTables.js';?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'TableTools/js/TableTools.js'?>"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'TableTools/js/ZeroClipboard.js'?>"></script>

<style type="text/css" title="currentStyle">
			@import "<?php echo plugin_dir_url(__FILE__).'css/demo_page.css';?>";
			@import "<?php echo plugin_dir_url(__FILE__).'css/demo_table_jui.css';?>";
			@import "<?php echo plugin_dir_url(__FILE__).'css/themeroller.css';?>";
</style>



<script type="text/javascript" charset="utf-8">
$(document).ready( function () {
	var oTable = $('#ammap').dataTable( {
		"bJQueryUI": true,
		"sScrollX": "150%",
		"sScrollXInner": "250%",
		"bScrollCollapse": true,
		"bSort": true,
		"sDom": '<"H"Tfr>t<"F"ip>',
		"sPaginationType": "full_numbers",
		"oLanguage": {
			"sProcessing":   "Caricamento...",
			"sLengthMenu":   "Visualizza _MENU_ elementi",
			"sZeroRecords":  "Nessun risultato trovato.",
			"sInfo":         "Vista da _START_ a _END_ di _TOTAL_ elementi",
			"sInfoEmpty":    "Vista da 0 a 0 di 0 elementi",
			"sInfoFiltered": "(filtrati da _MAX_ elementi totali)",
			"sInfoPostFix":  "",
			"sSearch":       "Cerca:",
			"sFirst":    "Inizio",
			"sPrevious": "Precedente",
			"sNext":     "Successivo",
			"sLast":     "Fine",
			"oPaginate": {
				"sFirst":    "Inizio",
				"sPrevious": "Precedente",
				"sNext":     "Successivo",
				"sLast":     "Fine",
				"sDom": '<"H"Tfr>t<"F"ip>',
				"sDom": 'T<"clear">lfrtip',
			},
		},
		"oTableTools": {
			"sSwfPath": "<?php echo plugin_dir_url(__FILE__).'TableTools/swf/copy_csv_xls_pdf.swf'?>",
			"aButtons": [
				{
					"sExtends": "csv",
					"sButtonText": "CSV",
					"sFileName": "<?php echo get_bloginfo( 'name' );?>_amministrazioneaperta.csv"
				},
				{

					"sExtends": "xls",

					"sButtonText": "EXCEL",

					"sFileName": "<?php echo get_bloginfo( 'name' );?>_amministrazioneaperta.xls"

				},

				{

					"sExtends": "pdf",

					"sButtonText": "PDF",

					"sPdfOrientation": "landscape",

					"sPdfMessage": "<?php echo get_bloginfo( 'name' );?> - Amministrazione Aperta",

					"sFileName": "<?php echo get_bloginfo( 'name' );?>_amministrazioneaperta.pdf"

				}

			]

		}

	} );

new FixedColumns( oTable );

} );

</script>
<p>Anno di Riferimento:
<?php if ($anno=="all") {
	echo '<b>TUTTI</b>';
} else {
	echo '<b>' . $anno . '</b>';
}
?></p>
<table id="ammap" class="display">

    <thead>

        <tr>
            <th>Titolo</th>
            <th>Importo</th>
            <th>Beneficiario</th>
            <th>Dati Fiscali</th>
            <th>Norma</th>
            <th>Modalità</th>
            <th>Responsabile</th>
            <th>Determina</th>
            <th>Data</th>
        </tr>



    </thead>
    <tbody>

	
<?php if ($anno=="all") {
query_posts( array( 'post_type' => spesa, 'orderby' => date, 'order' => DESC, 'posts_per_page' => -1  ) );
} else {
query_posts( array( 'post_type' => spesa, 'orderby' => date, 'year' => $anno, 'order' => DESC, 'posts_per_page' => -1  ) );
}
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


        <tr>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">€ <?php echo get_post_meta(get_the_ID(), 'ammap_importo', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_beneficiario', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_fiscale', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_norma', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_assegnazione', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_responsabile', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), 'ammap_determina', true); ?></a></td>
            <td><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
<?php
$a = get_post_meta(get_the_ID(), 'ammap_data', true);
$b = str_replace( ',', '', $a );
$a = $b;
echo date("d/m/Y", strtotime($a));
?>
</a></td>
        </tr>

<?php endwhile; else: ?>
 <p>Errore query.</p>
<?php endif; ?>
<?php wp_reset_query(); ?>



    </tbody>



</table><br/><hr/>