<?php
// Register Custom Post Type
function cpt_Sponsors() {

	$labels = array(
		'name'                  => 'Sponsors',
		'singular_name'         => 'Sponsor',
		'menu_name'             => 'Sponsors',
		'name_admin_bar'        => 'Sponsor',
		'archives'              => 'Sponsor Archives',
		'attributes'            => 'Sponsor Attributes',
		'parent_item_colon'     => 'Parent Sponsor:',
		'all_items'             => 'All Sponsors',
		'add_new_item'          => 'Add New Sponsor',
		'add_new'               => 'Add Sponsor',
		'new_item'              => 'New Sponsor',
		'edit_item'             => 'Edit Sponsor',
		'update_item'           => 'Update Sponsor',
		'view_item'             => 'View Sponsor',
		'view_items'            => 'View Sponsors',
		'search_items'          => 'Search Sponsor',
		'not_found'             => 'Sponsor not found',
		'not_found_in_trash'    => 'Sponsor not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Sponsor',
		'uploaded_to_this_item' => 'Uploaded to this Sponsor',
		'items_list'            => 'Sponsors list',
		'items_list_navigation' => 'Sponsors list navigation',
		'filter_items_list'     => 'Filter Sponsors list',
	);

	$rewrite = array(
		'slug'                  => 'sponsors',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);

	$args = array(
		'label'                 => 'Sponsor',
		'description'           => 'Sponsors on KOOP.',
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-heart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);

	register_post_type( 'sponsors', $args );
}

add_action( 'init', 'cpt_sponsors', 0 );
