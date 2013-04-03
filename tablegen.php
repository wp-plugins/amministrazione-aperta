<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'js/jquery.dataTables.js';?>"></script><script type="text/javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'TableTools/js/TableTools.js'?>"></script><script type="text/javascript" charset="utf-8" src="<?php echo plugin_dir_url(__FILE__).'TableTools/js/ZeroClipboard.js'?>"></script>

<style type="text/css" title="currentStyle">
			@import "<?php echo plugin_dir_url(__FILE__).'css/demo_page.css';?>";			@import "<?php echo plugin_dir_url(__FILE__).'css/demo_table_jui.css';?>";			@import "<?php echo plugin_dir_url(__FILE__).'css/themeroller.css';?>";

		</style>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		oTable = $('#ammap').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"oLanguage": {
			"sProcessing":   "Caricamento...",
			"sLengthMenu":   "Visualizza _MENU_ elementi",
			"sPaginationType": "full_numbers",
			"sDom": 'Tlfrtip',    
			"sZeroRecords":  "Nessun risultato trovato.",
			"sInfo":         "Vista da _START_ a _END_ di _TOTAL_ elementi",
			"sInfoEmpty":    "Vista da 0 a 0 di 0 elementi",
			"sInfoFiltered": "(filtrati da _MAX_ elementi totali)",
			"sInfoPostFix":  "",
			"sSearch":       "Cerca:",
			"sUrl":          "",
			"oPaginate": {
		"sFirst":    "Inizio",
		"sPrevious": "Precedente",
		"sNext":     "Successivo",
		"sLast":     "Fine",
		"sDom": '<"H"Tfr>t<"F"ip>',
		"sDom": 'T<"clear">lfrtip',
	}
	}
});
} );
</script>
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
<?php query_posts('post_type=spesa'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <tr>
            <td><?php the_title(); ?></td>
            <td>€ <?php echo get_post_meta(get_the_ID(), 'ammap_importo', true); ?></td>
            <td><?php echo get_post_meta(get_the_ID(), 'ammap_beneficiario', true); ?></td>
            <td><?php echo get_post_meta(get_the_ID(), 'ammap_fiscale', true); ?></td>
            <td><?php echo get_post_meta(get_the_ID(), 'ammap_norma', true); ?></td>
            <td><?php echo get_post_meta(get_the_ID(), 'ammap_assegnazione', true); ?></td>
            <td><?php echo get_post_meta(get_the_ID(), 'ammap_responsabile', true); ?></td>
            <td><?php echo get_post_meta(get_the_ID(), 'ammap_determina', true); ?></td>
            <td><?php echo get_post_meta(get_the_ID(), 'ammap_data', true); ?></td>
        </tr>
<?php endwhile; else: ?>
 <p>Errore query.</p>
 <?php endif; ?>
    </tbody>
</table><br/><hr/>