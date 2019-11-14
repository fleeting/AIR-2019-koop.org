<?php get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container" role="main">
        <p class="meta">
          <span class="flag">
            <?php $categories = get_the_category(); ?>
            <?= $categories[0]->name; ?>
          </span>

          <span class="date"><?php $post_date = get_the_date( 'F d, Y' ); echo $post_date; ?></span>
        </p>

        <?php
        $categories = get_the_category();
        //echo '<pre>'; print_r($categories); echo '</pre>';
        ?>

				<?= the_content(); ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
