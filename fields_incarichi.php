<?php
/*
* configure your meta box
*/
$config  = array(
    'id' => 'ammap_meta_box', // meta box id, unique per meta box 
    'title' => 'Dettagli Voce', // meta box title
    'pages' => array('incarico'), // post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal', // where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high', // order of meta box: high (default), low; optional
    'fields' => array(), // list of meta fields (can be added by field arrays) or using the class's functions
    'local_images' => false, // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);
/*
* Initiate your meta box
*/
$my_meta = new AT_Meta_Box($config);
/*
* Campi personalizzati del Plugin - Usa API terze parti
*/
$prefix  = "ammap_";
$my_meta->addText($prefix . 'beneficiario', array(
    'name' => 'Soggetto Percettore'
));
$my_meta->addText($prefix . 'importo_previsto', array(
    'name' => 'Compenso Lordo Previsto',
	'desc' => 'Da compilare solo nel caso di soggetti beneficiari estranei alla Pubblica Amministrazione'
));
$my_meta->addText($prefix . 'importo', array(
    'name' => 'Compenso Lordo Erogato'
));
$my_meta->addDate($prefix . 'data_inizio', array('name'=> 'Data Inizio', 'format' => 'd-m-yy'));
$my_meta->addDate($prefix . 'data_fine', array('name'=> 'Data Fine', 'format' => 'd-m-yy'));
//text field
$my_meta->addWysiwyg($prefix . 'wysiwyg', array(
    'name' => 'Note & documentazione',
	'desc' => 'Inserire qui un\'eventuale descrizione libera e, ove previsto, il curriculum del soggetto percettore'
));
//Finish Meta Box Deceleration
$my_meta->Finish();
?>