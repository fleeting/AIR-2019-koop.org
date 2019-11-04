<!-- Start PageBuilder. -->
<?php if( have_rows('flexible-content') ):
  while ( have_rows('flexible-content') ) : the_row();
    $templatePart = 'partials/page-builder/' . get_row_layout();
    // Look for a template that matches the PageBuilder element and load it.
    if (locate_template( $templatePart . '.php' ) != '') {
      get_template_part( $templatePart );
    } else {
      // If no template is found, do nothing for now.
      //echo '<p>' . get_row_layout() . '</p>';
    }
  endwhile;
endif; ?>
<!-- End PageBuilder. -->
