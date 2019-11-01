<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					echo '<h1>' . get_the_title() . '</h1>';
					echo the_content(); 

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>