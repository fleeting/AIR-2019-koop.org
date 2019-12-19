<?php
// Register Custom Post Type Event

function cpt_event() {

	$labels = array(
		'name'                  => 'Events',
		'singular_name'         => 'Event',
		'menu_name'             => 'Events',
		'name_admin_bar'        => 'Events',
		'archives'              => 'Event Archives',
		'attributes'            => 'Event Attributes',
		'parent_item_colon'     => 'Parent Event:',
		'all_items'             => 'All Events',
		'add_new_item'          => 'Add New Event',
		'add_new'               => 'Add Event',
		'new_item'              => 'New Event Item',
		'edit_item'             => 'Edit Event',
		'update_item'           => 'Update Event',
		'view_item'             => 'View Event',
		'view_items'            => 'View Event',
		'search_items'          => 'Search Event',
		'not_found'             => 'Event not found',
		'not_found_in_trash'    => 'Event not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Event',
		'uploaded_to_this_item' => 'Uploaded to this Event',
		'items_list'            => 'Event list',
		'items_list_navigation' => 'Event list navigation',
		'filter_items_list'     => 'Filter Event list',
	);

	$rewrite = array(
		'slug'                  => 'events',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);

	$args = array(
		'label'                 => 'Event',
		'description'           => 'Scheduled Event on KOOP.',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);

	register_post_type( 'events', $args );
}

add_action( 'init', 'cpt_event', 0 );
