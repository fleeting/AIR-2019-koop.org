<?php
// Register Custom Post Type
function cpt_homepage_hero() {

	$labels = array(
		'name'                  => 'Home Page Hero',
		'singular_name'         => 'Hero Item',
		'menu_name'             => 'Home Page Hero',
		'name_admin_bar'        => 'Home Page Hero',
		'archives'              => 'Home Page Hero Archives',
		'attributes'            => 'Home Page Hero Attributes',
		'parent_item_colon'     => 'Parent Hero:',
		'all_items'             => 'All Hero Items',
		'add_new_item'          => 'Add New Hero Item',
		'add_new'               => 'Add Hero Item',
		'new_item'              => 'New Hero Item',
		'edit_item'             => 'Edit Hero Item',
		'update_item'           => 'Update Hero Item',
		'view_item'             => 'View Hero Item',
		'view_items'            => 'View Hero Items',
		'search_items'          => 'Search Hero Item',
		'not_found'             => 'Hero item not found',
		'not_found_in_trash'    => 'Hero item not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into hero item',
		'uploaded_to_this_item' => 'Uploaded to this hero item',
		'items_list'            => 'Hero items list',
		'items_list_navigation' => 'Hero items list navigation',
		'filter_items_list'     => 'Filter hero items list',
  );

	$args = array(
		'label'                 => 'Home Page Hero',
		'description'           => 'Featured content displayed in the hero section of the Home Page.',
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
  );

	register_post_type( 'homepage_hero', $args );
}

add_action( 'init', 'cpt_homepage_hero', 0 );
