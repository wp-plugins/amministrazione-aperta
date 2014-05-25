<?php

	if ($anni==1) {
		$anni_query = date("Y");
	} else if ($anni > 1 && $anni < 5) { // Anni: 2 - 3 - 4
		$anni_query[$anni];
		$anni_query[0] = date("Y");
		for ($i=1; $i<$anni; $i++) {
			$anni_query[$i] = date("Y")-$i;
		}
	} else {
		echo '<strong>Errore durante il rendering dei parametri dello shortcode.</strong><br/>Controlla che il campo "anni" contenga un valore compreso tra 1 (solo anno corrente) e 4 (quattro anni comparati).<br/>Valore critico: <strong>' . $anni . '</strong>';
		return;
	}
	
	query_posts( array( 'post_type' => spesa, 'orderby' => date, 'order' => DESC, 'posts_per_page' => -1  ) );
?>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '2014', '2013'],
          ['Gennaio',  1000,      400],
          ['Febbraio',  1170,      460],
          ['Marzo',  660,       1120],
		  ['Aprile',  660,       1120],
		  ['Maggio',  660,       1120],
		  ['Giugno',  660,       1120],
		  ['Luglio',  660,       1120],
		  ['Agosto',  660,       1120],
		  ['Settembre',  660,       1120],
		  ['Ottobre',  660,       1120],
		  ['Novembre',  660,       1120],
          ['Dicembre',  1030,      540]
        ]);

        var options = {
          title: 'Spese a confronto',
          hAxis: {title: 'Anno',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

<div id="chart_div" style="background-color: transparent; width: <?php echo $width; ?>; height: <?php echo $height; ?>;"></div>
