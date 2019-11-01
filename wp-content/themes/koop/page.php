<?php

	get_header(); 
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container" role="main">
			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();


					echo the_content();

				endwhile; // End of the loop.
			?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php 
	//GET DATA FOR FEATURE

	//SHOW FEATURE
	echo '
		<section>
			<div class="home callout">
				<div class="row">
					<div class="col-md-6 image">
						<div class="content">
							<img src="/wp-content/uploads/2019/10/austin-skyline-1.jpg" alt="FPO Image" />
						</div>
					</div>
					<div class="col-md-6 text">
						<div class="content">
							<h2>Mauris laoreet dictum massa in egestas lorem</h2>
							<p>Mauris laoreet dictum massa in egestas lorem. Nulla nec sapien elit. Sed lacinia neque id erat laoreet fermentum.</p>
							<a class="btn btn-outline-light" title="" href="#">Learn More</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	';
?>

<?php get_footer(); ?>