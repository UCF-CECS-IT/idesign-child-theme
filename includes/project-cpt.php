<?php

function project_post_type() {
	$labels = array(
		'name'                  => _x( 'Project', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Project', 'text_domain' ),
		'name_admin_bar'        => __( 'Project', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'text_domain' ),
		'labels'                => $labels,
		'menu_position'     	=> 5,
		'public'            	=> true,
		'has_archive'       	=> true,
		'supports'          	=> array('title', 'thumbnail', 'revisions')
	);

	register_post_type('project', $args);
}
add_action( 'init', 'project_post_type', 0 );
