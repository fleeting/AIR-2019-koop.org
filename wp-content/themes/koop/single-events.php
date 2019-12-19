<?php get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container" role="main">

				<?php the_content(); ?>

				<a href="/events">Back to all events</a>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
