<?php


require_once( trailingslashit( get_template_directory() ). 'includes/actions.php');
require_once( trailingslashit( get_template_directory() ). 'includes/filters.php');
require_once( trailingslashit( get_template_directory() ). 'includes/menus.php');
require_once( trailingslashit( get_template_directory() ). 'includes/enqueue.php');
require_once( trailingslashit( get_template_directory() ). 'includes/acf.php');
//require_once( trailingslashit( get_template_directory() ). 'includes/shortcodes.php');
require_once( trailingslashit( get_template_directory() ). 'includes/post-types.php');

// Remove tab index attributes from all GravityForm fields.
add_filter( 'gform_tabindex', '__return_false' );

// Add autocomplete to GravityForm fields.
add_filter( 'gform_field_content', 'gform_form_input_autocomplete', 11, 5 );
function gform_form_input_autocomplete( $input, $field, $value, $lead_id, $form_id ) {
  if ( is_admin() ) return $input;

  if ( GFFormsModel::is_html5_enabled() ) {
    if($field->type === "email") {
      $input = preg_replace( '/<(input|textarea)/', '<${1} autocomplete="email"', $input );
    } else {
      $input = preg_replace( '/<(input|textarea)/', '<${1} autocomplete="on"', $input );
    }
  }

  return $input;
}
