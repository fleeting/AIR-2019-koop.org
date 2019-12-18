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

				<div class="col-md-12">
					<section id="latest_news">
						<h2>Latest News</h2>
						<?php
							$args = array(
								'post_type' => 'News',
								'posts_per_page' => -1,
							);
							$loop = new WP_Query( $args ); ?>
							<ul>
							 <?php while ( $loop->have_posts() ) : $loop->the_post();
							 $categories = get_the_category();
							 if ( $categories ) :
								 $single_category_link = esc_url( get_category_link( $categories[0]->term_id ) );
								 $single_category_name = esc_html( $categories[0]->name );
							 endif ?>

									<li class="news_item">
										<div class="row">
											<div class="col-md-4 image">
												<img class="" src="' . get_template_directory_uri() .'/images/dist/fpo-show.jpg" alt="FPO News" />
											</div>
											<div class="col-md-8 text">
												<div class="content">
													<p class="meta">
														<span class="flag"><?php echo $single_category_name ?>
														</span><span class="date"><?php echo get_the_date( 'M d, Y' ); ?></span></p>
													<h3><a href="<?php echo get_the_permalink(); ?>" title=""><?php echo get_the_title(); ?></a></h3>
													<p><?php echo get_the_excerpt(); ?></p>
												</div>
											</div>
										</div>
									</li>
									<?php endwhile; wp_reset_postdata(); ?>
								</ul>
					</section>
				</div>
			</div>
		</div>

			</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
