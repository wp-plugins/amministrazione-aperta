<?php
/*
* configure your meta box
*/
$config  = array(
    'id' => 'ammap_meta_box', // meta box id, unique per meta box 
    'title' => 'Dettagli Voce', // meta box title
    'pages' => array(
        'spesa'
    ), // post types, accept custom post types as well, default is array('post'); optional
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
    'name' => 'Beneficiario'
));
$my_meta->addText($prefix . 'importo', array(
    'name' => 'Importo. Es. 2.000'
));
$my_meta->addText($prefix . 'fiscale', array(
    'name' => 'Dati Fiscali'
));
$my_meta->addText($prefix . 'norma', array(
    'name' => 'Norma'
));
$my_meta->addText($prefix . 'responsabile', array(
    'name' => 'Responsabile'
));
$my_meta->addText($prefix . 'determina', array(
    'name' => 'Determina'
));
$my_meta->addSelect($prefix . 'assegnazione', array(
    'Chiamata Diretta' => 'Chiamata Diretta',
    'Bando Pubblico' => 'Bando Pubblico',
	'Cottimo Fiduciario' => 'Cottimo Fiduciario',
    'Mercato Elettronico' => 'Mercato Elettronico',
    'Convenzione CONSIP' => 'Convenzione CONSIP',
	'Procedura aperta' => 'Procedura aperta',
	'Procedura negoziata' => 'Procedura negoziata',
    'Procedura ristretta' => 'Procedura ristretta',
    'Procedura selettiva' => 'Procedura selettiva'
), array(
    'name' => 'Modalità Assegnazione',
    'std' => array(
        'Selezionare...'
    )
));
$my_meta->addDate($prefix . 'data', array(
    'name' => 'Data'
));
//text field
$my_meta->addWysiwyg($prefix . 'wysiwyg', array(
    'name' => ' Note libere e caricamento file'
));
/*



* Don't Forget to Close up the meta box deceleration



*/
//Finish Meta Box Deceleration
$my_meta->Finish();
?>