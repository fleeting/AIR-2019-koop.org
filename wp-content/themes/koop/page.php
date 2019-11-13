<?php get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container" role="main">

					<?= the_content(); ?>

				<?php get_template_part( 'partials/page-builder' ); ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

	<?php if(!empty(get_field( 'title' ))): ?>
		<section>
			<div class="home callout">
				<div class="row">
					<div class="col-md-6 image">
						<div class="content">
							<?php $image = get_field( 'image' ); ?>
							<img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
						</div>
					</div>
					<div class="col-md-6 text">
						<div class="content">
							<h2><?= get_field( 'title' ); ?></h2>
							<p><?= get_field( 'description' ); ?></p>
							<a class="btn btn-outline-light" href="<?= get_field( 'button_link' ); ?>"><?= get_field( 'button_text' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
