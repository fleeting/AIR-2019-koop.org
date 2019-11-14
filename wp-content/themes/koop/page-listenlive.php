<?php
/*
Template Name: Listen Live
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container" role="main">
        <audio data-able-player playsinline data-show-now-playing="false">
          <source src="http://streaming.koop.org:8534/;stream.aac">
        </audio>


        <?php get_template_part( 'partials/page-builder' ); ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
