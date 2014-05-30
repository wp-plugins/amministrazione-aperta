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
			<?php if ($tipo == "incarico") { ?>
			<th>Ragione dell'Incarico</th>
            <th>Soggetto percettore</th>
            <th>Importo lordo previsto</th>
            <th>Importo lordo erogato</th>
            <th>Data di inizio</th>
            <th>Data di fine</th>
			<?php } else { ?>
            <th>Titolo</th>
            <th>Importo</th>
            <th>Beneficiario</th>
            <th>Dati Fiscali</th>
            <th>Norma</th>
            <th>Modalità</th>
            <th>Responsabile</th>
            <th>Determina</th>
            <th>Data</th>
			<?php } ?>
        </tr>
    </thead>
    <tbody>

<?php query_posts( array( 'post_type' => $tipo, 'orderby' => date, 'order' => DESC, 'posts_per_page' => -1  ) ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

	if ($tipo == "spesa") { include('tablegen_spesa.php'); } else if ($tipo == "incarico") { include('tablegen_incarico.php'); } else { echo 'Parametro $tipo errato. Impossibile valorizzare il campo'; }

endwhile; else: ?>
 <p>Errore query.<br/>
 <small>Si è verificato un errore durante l'esecuzione della query scelta. E' possibile che siano stati impostati parametri errati o che non ci siano dati da elaborare</small></p>
<?php endif; ?>
<?php wp_reset_query(); ?>



    </tbody>



</table><br/><hr/>