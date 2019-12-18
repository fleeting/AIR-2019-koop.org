<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/category/'.get_cat_name($cat).'/' ) ); ?>" method="get">
<?php
  $args = array(
   'cat' => get_query_var('cat'),
   'hierarchical' => 0,
   'value_field'      => 'slug',
   'orderby'=> 'title',
   'show_option_none' => 'Select a Category',
   'echo' => false,
   'parent' => get_query_var('cat'));

  $term = get_queried_object();

  $children = get_terms( $term->taxonomy, array(
  'parent'    => $term->term_id,
  'hide_empty' => true
  ) );

  if($children) {


  $select  = wp_dropdown_categories($args);
  $replace = "<select$1 onchange='return this.form.submit()'>";
  $select  = preg_replace( '#<select([^>]*)>#', $replace, $select );
  echo $select;
} ?>
<noscript>
  <input type="submit" value="View" />
</noscript>
