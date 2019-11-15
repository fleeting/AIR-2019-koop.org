<?php


require_once( trailingslashit( get_template_directory() ). 'includes/actions.php');
require_once( trailingslashit( get_template_directory() ). 'includes/filters.php');
require_once( trailingslashit( get_template_directory() ). 'includes/menus.php');
require_once( trailingslashit( get_template_directory() ). 'includes/enqueue.php');
require_once( trailingslashit( get_template_directory() ). 'includes/acf.php');
//require_once( trailingslashit( get_template_directory() ). 'includes/shortcodes.php');
require_once( trailingslashit( get_template_directory() ). 'includes/post-types.php');

add_filter( 'gform_tabindex', '__return_false' );
