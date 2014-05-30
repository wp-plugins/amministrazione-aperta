<?php
	$labels = array(
        'name' => _x('Contributi & Concessioni', 'spesa'),
        'singular_name' => _x('Spesa', 'spesa'),
        'add_new' => _x('Nuova voce', 'spesa'),
        'add_new_item' => _x('Nuovo Contributo o Concessione', 'spesa'),
        'edit_item' => _x('Modifica Spesa', 'spesa'),
        'new_item' => _x('Nuova Spesa', 'spesa'),
        'view_item' => _x('Visualizza Spesa', 'spesa'),
        'search_items' => _x('Cerca Spesa', 'spesa'),
        'not_found' => _x('Nessun elemento trovato', 'spesa'),
        'not_found_in_trash' => _x('Nessun elemento trovato', 'spesa'),
        'parent_item_colon' => _x('Parent Spesa:', 'spesa'),
        'menu_name' => _x('Concessioni', 'spesa')
    );
    $args   = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => '',
        'supports' => array('title', 'post_tag'),
        'public' => true,
		'show_ui' => true,
		'menu_position' => 38,
        'menu_icon' => 'dashicons-welcome-learn-more',
		'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => false,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );
    register_post_type('spesa', $args);
	
	
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	
		$labels = array(
        'name' => _x('Incarichi & Consulenze', 'aa_incarichi'),
        'singular_name' => _x('Incarichi', 'aa_incarichi'),
        'add_new' => _x('Nuova voce', 'aa_incarichi'),
        'add_new_item' => _x('Nuovo Incarico o Consulenza', 'aa_incarichi'),
        'edit_item' => _x('Modifica Incarico', 'aa_incarichi'),
        'new_item' => _x('Nuova Spesa', 'aa_incarichi'),
        'view_item' => _x('Visualizza Spesa', 'aa_incarichi'),
        'search_items' => _x('Cerca Spesa', 'aa_incarichi'),
        'not_found' => _x('Nessun elemento trovato', 'aa_incarichi'),
        'not_found_in_trash' => _x('Nessun elemento trovato', 'aa_incarichi'),
        'parent_item_colon' => _x('Parent Spesa:', 'aa_incarichi'),
        'menu_name' => _x('Incarichi', 'aa_incarichi')
    );
    $args   = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => '',
        'supports' => array('title', 'post_tag'),
        'public' => true,
		'show_ui' => true,
		'menu_position' => 39,
		'menu_icon' => 'dashicons-businessman',
		'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => false,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );
    register_post_type('incarico', $args);
	
	
	//TASSONOMIA TIPI INCARICO
	$labels = array( 
			'name' => _x( 'Tipo Incarico', 'tipo_incarico' ),
		);
	$args = array( 
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud' => false,
			'show_admin_column' => true,
			'hierarchical' => true,
			'capabilities' => array('manage_terms' => 'utentealieno','edit_terms'   => 'utentealieno','delete_terms' => 'utentealieno'),
			'rewrite' => true,
			'query_var' => true
		);
		register_taxonomy( 'tipo_incarico', array('incarico'), $args );
	if(!term_exists('Incarichi conferiti o autorizzati ai propri dipendenti', 'tipo_incarico')) {
		wp_insert_term('Incarichi conferiti o autorizzati ai propri dipendenti', 'tipo_incarico');
	}
	if(!term_exists('Incarichi conferiti a dipendenti di altra Amministrazione', 'tipo_incarico')) {
		wp_insert_term('Incarichi conferiti a dipendenti di altra Amministrazione', 'tipo_incarico');
	}
	if(!term_exists('Incarichi conferiti a soggetti estranei alla Pubblica Amministrazione', 'tipo_incarico')) {
		wp_insert_term('Incarichi conferiti a soggetti estranei alla Pubblica Amministrazione', 'tipo_incarico');
	}
	if(term_exists('Incarichi conferiti o autorizzati a dipendenti di altra Amministrazione', 'tipo_incarico')) {
		$id_1 = get_term_by('name', 'Incarichi conferiti o autorizzati a dipendenti di altra Amministrazione', 'tipo_incarico');
		wp_delete_term($id_1->term_id, 'tipo_incarico');
	}
	if(term_exists('Incarichi conferiti o autorizzati a soggetti estranei alla Pubblica Amministrazione', 'tipo_incarico')) {
		$id_2 = get_term_by('name', 'Incarichi conferiti o autorizzati a soggetti estranei alla Pubblica Amministrazione', 'tipo_incarico');
		wp_delete_term($id_2->term_id, 'tipo_incarico');
	}
?>