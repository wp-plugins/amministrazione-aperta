<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__); ?>js/excellentexport.min.js"></script>
<script>

(function(document) {
    'use strict';

    var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }

        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function(input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
            LightTableFilter.init();
        }
    });

})(document);

</script>

<p>Anno di Riferimento:
<?php if ($anno=="all") {
    echo '<b>TUTTI</b>';
} else {
    echo '<b>' . $anno . '</b>';
}
?></p>

<table id="amministrazione-aperta" class="order-table table display">
    <thead>
        <tr>
            <input type="search" id="s" class="light-table-filter" data-table="order-table" placeholder="Cerca...">
        </tr>
        <tr>
            <?php if ($tipo == "incarico") { ?>
                <th colspan="2">Ragione dell'Incarico</th>
                <th>Soggetto percettore</th>
                <th>Importo lordo previsto</th>
                <th>Importo lordo erogato</th>
                <th>Data di inizio</th>
                <th>Data di fine</th>
            <?php } else { ?>
                <th colspan="2">Titolo</th>
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

    if ($tipo == "spesa") {
        include('tablegen_spesa.php');
    } else if ($tipo == "incarico") {
        include('tablegen_incarico.php');
    } else {
        echo 'Parametro $tipo errato. Impossibile valorizzare il campo';
    }

endwhile; else: ?>
 <p>Errore query.<br/>
 <small>Si è verificato un errore durante l'esecuzione della query scelta. E' possibile che siano stati impostati parametri errati o che non ci siano dati da elaborare</small></p>
<?php endif; ?>
<?php wp_reset_query(); ?>



    </tbody>
</table>
                <?php
                    echo '<a download="' . get_bloginfo('name') . '-opendata' . $anno . '.xls" href="#" onclick="return ExcellentExport.excel(this, \'amministrazione-aperta\', \'Gare\');"><button>EXCEL</button></a>
            <a download="' . get_bloginfo('name') . '-opendata' . $anno . '.csv" href="#" onclick="return ExcellentExport.csv(this, \'amministrazione-aperta\');"><button>CSV</button></a>';
                ?><hr>
<div class="clear"></div>
