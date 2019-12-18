<?php
// Register Custom Post Type News

add_theme_support('post-thumbnails');

function cpt_news() {

	$labels = array(
		'name'                  => 'News',
		'singular_name'         => 'News',
		'menu_name'             => 'News',
		'name_admin_bar'        => 'News',
		'archives'              => 'News Archives',
		'attributes'            => 'News Attributes',
		'parent_item_colon'     => 'Parent News:',
		'all_items'             => 'All News',
		'add_new_item'          => 'Add New News',
		'add_new'               => 'Add News',
		'new_item'              => 'New News Item',
		'edit_item'             => 'Edit News',
		'update_item'           => 'Update News',
		'view_item'             => 'View News',
		'view_items'            => 'View News',
		'search_items'          => 'Search News',
		'not_found'             => 'News not found',
		'not_found_in_trash'    => 'News not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into News',
		'uploaded_to_this_item' => 'Uploaded to this News',
		'items_list'            => 'News list',
		'items_list_navigation' => 'News list navigation',
		'filter_items_list'     => 'Filter News list',
	);

	$rewrite = array(
		'slug'                  => 'news',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);

	$args = array(
		'label'                 => 'News',
		'description'           => 'Scheduled News on KOOP.',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'  					=> array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-microphone',
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

	register_post_type( 'News', $args );
}

add_action( 'init', 'cpt_news', 0 );

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'news'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}
