<?php get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container" role="main">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php echo the_content(); ?>

      <?php endwhile; endif; // end loop. ?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
