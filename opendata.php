<?php
add_action( 'admin_menu', 'register_aa_opendata' );

function register_aa_opendata(){
	add_submenu_page( 'impostazioni-wpgov', 'Statistiche Open Data', 'Statistiche', 'manage_options', 'aa_statistiche', 'aa_statistiche_menu' ); 
}

function aa_statistiche_menu () {

	echo '<div class="wrap">';
	
		echo'<div class="updated" id="wpgov-message">
			<p>
				In questa pagina sono presenti alcuni grafici statistici riguardanti i dati inseriti dall\'ente.<br/>
				I grafici sono aggiornati in tempo reale e sono inseribili nei contenuti del sito tramite shortcode.
			</p>
		</div>';
		
		echo '<h2>Statistiche Open data</h2>';
		echo '<div class="wpgov-box">';
		echo '<script src="' . plugin_dir_url(__FILE__) . 'open_charts/Chart.min.js' . '"></script>';
		
		echo '<style>
		section {
			width: 100%;
			margin: 40px auto;
		}
		.half {
			width: 45%;
			float:left;
			height:300px;
		}
		.half p {
			font-family: "Open Sans",sans-serif;
			line-height: 24px;
			font-size: 18px;
			color: #767c8d;
		}
		</style>';
		
		echo '<section>
			<div class="half">
			
			<h2>Spese</h2>
			<p>PRESTO DISPONIBILI
			</p>
		
		</div><div class="half">';
		echo do_shortcode('[aa anni="3"]');
		echo '</div>
			</section>';
		
		echo '<section>
			<div class="half">';
		require_once(plugin_dir_path(__FILE__) . 'open_charts/shortcode1.php');
		
		echo '</div><div class="half">
		
		</div>
			</section>';
		
	echo '<div class="clear"></div>
		</div>
	</div>';
}
?>