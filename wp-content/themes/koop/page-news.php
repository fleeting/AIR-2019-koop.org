<?php
/*
Template Name: News Overview
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

			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
