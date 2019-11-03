<?php get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container" role="main">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- Start PageBuilder. -->
        <?php if( have_rows('flexible-content') ):
          while ( have_rows('flexible-content') ) : the_row();
            $templatePart = 'partials/page-builder/' . get_row_layout();
            // Look for a template that matches the PageBuilder element and load it.
            if (locate_template($templatePart . '.php') != '') {
              get_template_part($templatePart);
            } else {
              // If no template is found, do nothing for now.
              //echo '<p>' . get_row_layout() . '</p>';
            }
          endwhile;
        endif; ?>
        <!-- End PageBuilder. -->
      <?php endwhile; endif; // end loop. ?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
