<?php
echo '<div class="wrap">';

    ?>
<div id="welcome-panel" class="welcome-panel">

    <div class="welcome-panel-content">

        <div style="float:right;position:relative;margin-right: 20px;">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="F2JK36SCXKTE2">
            <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - Il metodo rapido, affidabile e innovativo per pagare e farsi pagare.">
            <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
        <br>
    <img style="float:left;padding: 5px 20px;position:absolute;" src="<?php echo plugin_dir_url(__FILE__) . 'inc/wpa_black.png'; ?>">

    <div class="welcome-panel-column-container">
    <div class="welcome-panel-column">
        <br><br><br>
    </div>
    <div class="welcome-panel-column">
        <h4>Notizie</h4>
        <ul>
    <?php
    include_once( ABSPATH . WPINC . '/feed.php' );
    $rss = fetch_feed( 'http://www.wpgov.it/feed' );
    if ( ! is_wp_error( $rss ) ) {
        $maxitems = $rss->get_item_quantity( 3 );
        $rss_items = $rss->get_items( 0, $maxitems );
    }

    if ($maxitems) {
        foreach ( $rss_items as $item ) { ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>" target="_blank"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
    <?php
        }
    } ?>
        </ul>

    </div>
    <div class="welcome-panel-column welcome-panel-last">
        <h4>Impostazioni generali</h4>
        <ul>
<?php
    if ( isset($_POST['Submit']) ) {
        update_option( 'wpgov_show_love', isset($_POST['wpgov_show_love_n']) );
        update_option( 'wpgov_allow_track', isset($_POST['wpgov_allow_track_n']) );
    }
    if ( get_option('wpgov_show_love') ) { $wpgov_show_love = 'checked="checked" '; }
    if ( get_option('wpgov_allow_track') ) { $wpgov_allow_track = 'checked="checked" '; }

    echo '<form method="post" name="options" target="_self">';
    settings_fields( 'wpgov_options' );

    echo '
    <li><input '.$wpgov_show_love.'type="checkbox" type="submit" name="wpgov_show_love_n"><label for="wpgov_show_love_n">Mostra link WPGov</label></li>
    <!--<li><input '.$wpgov_allow_track.'type="checkbox" type="submit" name="wpgov_allow_track_n"><label for="wpgov_allow_track_n">Consenti monitoraggio</label></li>-->
    <input type="submit"  class="button button-small" name="Submit" value="Salva" />';

    echo '</form>'; ?>

        </ul>
    </div>
    </div>
    </div>
        </div><?php
    echo '<style>.box {width:90%;position:relative;height: 100px;margin: 50px auto; } </style>';

    global $pagenow;
    $settings = get_option( "wpgov_theme_settings" );

    //generic HTML and code goes here

    if(isset($_POST['FlushButton'])) {
        flush_rewrite_rules();
    }

    if ( isset ( $_GET['tab'] ) ) { $current = $_GET['tab'];  } else { $current = 'general'; }

    $tabs = array(
        'general' => '<span class="dashicons dashicons-admin-home"></span>',
        'at' => 'Amministrazione Trasparente', 'avcp' => 'XML Bandi di Gara',
        'aa' => 'Amministrazione Aperta'
    );
    echo '<h2 class="nav-tab-wrapper">';
    echo '<div style="float:right;">
        <a class="add-new-h2" href="http://wpgov.it/soluzioni/">Documentazione</a>
        <a class="add-new-h2" href="http://wpgov.it/supporto/">Supporto</a>
    </div>';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=impostazioni-wpgov&tab=$tab'>$name</a>";

    }
    echo '</h2>';


    if ( isset ( $_GET['tab'] ) ) { $tab = $_GET['tab']; } else { $tab = 'general'; }

   echo '<table class="form-table">';
   switch ( $tab ){
      case 'general' :
        include(plugin_dir_path(__FILE__) . 'info.php');
      break;
      case 'at' :
        if (is_plugin_active( 'amministrazione-trasparente/amministrazionetrasparente.php' )) {
            include(ABSPATH . 'wp-content/plugins/amministrazione-trasparente/wpgov/settings.php');
        } else {
            echo 'Plugin non installato!';
        }
      break;
      case 'avcp' :
        if (is_plugin_active( 'avcp/avcp.php' )) {
            include(ABSPATH . 'wp-content/plugins/avcp/wpgov/settings.php');
        } else {
            echo 'Plugin non installato!';
        }
      break;
      case 'aa' :
        if (is_plugin_active( 'amministrazione-aperta/amministrazioneaperta.php' )) {
            include(ABSPATH . 'wp-content/plugins/amministrazione-aperta/wpgov/settings.php');
        } else {
            echo 'Plugin non installato!';
        }
      break;
   }
   echo '</table>';

    echo '<center>
    Sviluppo e ideazione a cura di <a href="http://marcomilesi.ml" target="_blank" title="www.marcomilesi.ml">Marco Milesi</a><br/><small>Per la preparazione di questo programma sono state impiegate diverse ore a titolo volontario.<br>Se vuoi, puoi effettuare una piccola donazione utilizzando il link che trovi in alto a destra.</small><br/><a href="http://www.comune.sanpellegrinoterme.bg.it" title="Made in San Pellegrino Terme">+ Proudly made in San Pellegrino Terme</a></center></div>';
?>
