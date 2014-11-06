
<?php 
// Register Custom Taxonomy
function people_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Aufgabenbereich', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Aufgabenbereich', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Aufgabenbereich', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'people', array( 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'people_taxonomy', 0 );

// Register Custom Taxonomy
function show_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Kategorie', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Kategorie', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Kategorie', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'show', array( 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'show_taxonomy', 0 );

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'shows',
		array(
			'labels' => array(
			'menu_name'           => __( 'Sendung', 'text_domain' ),
			'name' => __( 'Sendungen' ),
			'singular_name' => __( 'Sendung' )),
			'taxonomies'          => array( 'show' ),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'show')
		)
	);
	register_post_type( 'program',
		array(
			'labels' => array(
				'name' => __( 'Programm' ),
				'singular_name' => __( 'Programm' )),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'program')
		)
	);
register_post_type( 'people',
		array(
			'labels' => array(
			'name' => __( 'Menschen' ),
			'singular_name' => __( 'Menschen' )),
			'taxonomies'          => array( 'people' ),

			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'people')
		)
	);
}

