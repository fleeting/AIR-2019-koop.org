<?php get_header(); ?>

	<section id="featured_shows">
		<div class="home featured_shows">
			<div class="row">
				<div class="col-12">
					<h2>Featured Shows</h2>
				</div>
				<?php
				//GET DATA
				$args = array(
					'post_type' => 'programs',
					'posts_per_page' => 3,
					'meta_key' => 'featured_program',
					'meta_value' => 1
				);
				$featured_programs = new WP_Query( $args );
				while ( $featured_programs->have_posts() ) : $featured_programs->the_post();
					$short_description = get_field('short_description');?>
					<div class="col-lg-4">
						<div class="featured_show">
							<div class="image">
								<?php $featured_image = get_field( 'featured_image' ); ?>
								<img src="<?= $featured_image['url']; ?>" alt="<?= $featured_image['alt']; ?>">
							</div>

							<?php
							if( have_rows( 'show_schedule' ) ):
								echo '<p class="date">';
								while ( have_rows( 'show_schedule' ) ) : the_row();
									echo get_sub_field( 'day' ) . ', ' . get_sub_field( 'start_time' );
								endwhile;
								echo '</p>';
							endif;
							?>

							<div class="info">
								<h3><a href="<?= get_the_permalink(); ?>" title="Permalink for <?= get_the_title(); ?>"><?= get_the_title(); ?></a></h3>
								<p><?= $short_description; ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

	<div class="home recents">
		<div class="row">
			<div class="col-md-6">
				<section id="upcoming_events">
					<h2>Upcoming Events</h2>
					<?php
						$args = array(
							'post_type' => 'events',
							'posts_per_page' => 3,
						);
						$loop = new WP_Query( $args ); ?>
						<ul>
						 <?php while ( $loop->have_posts() ) : $loop->the_post();
						 // Load field value.
						 $date = get_field('date_of_event');
						 $day = date("D", strtotime($date));
						 $md = date("m/d", strtotime($date));
						 $time = date("g:i A", strtotime($date));?>

								<li class="event_item">
									<div class="row no-gutters">
										<div class="col-md-3 date_info">
											<?php echo $day ?><br /><span class="date"><?php echo $md ?></span><br /><?php echo $time ?>
										</div>
										<div class="col-md-9 text">
											<h3><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
											<p><?php echo get_field('excerpt'); ?>[...]</p>
										</div>
									</div>
								</li>

								<?php endwhile; wp_reset_postdata(); ?>
							</ul>

				</section>
			</div>
			<div class="col-md-6">
				<section id="latest_news">
					<h2>Latest News</h2>
					<?php
						$args = array(
							'post_type' => 'News',
							'posts_per_page' => 3,
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
											<?php echo get_the_post_thumbnail(); ?>
										</div>
										<div class="col-md-8 text">
											<div class="content">
												<p class="meta">
													<span class="flag"><a href="<?php echo $single_category_link ?>"><?php echo $single_category_name ?></a></span><span class="date"><?php echo get_the_date( 'M d, Y' ); ?></span></p>
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

	<?php
		//SHOW FEATURE
		/* TODO: Get this hooked up in the admin somewhere. */
		echo '
			<section>
				<div class="home callout">
					<div class="row">
						<div class="col-md-6 image">
							<div class="content">
							<img src="/wp-content/uploads/2019/12/austin-howdy.jpg" alt="Graffiti mural of Austin, Texas">
							</div>
						</div>

						<div class="col-md-6 text">
							<div class="content">
								<h2>Donate to KOOP</h2>
								<p>For 25 years KOOP 91.7 FM has been training community volunteers in the art of broadcasting so they can share their passions as regards music and public affairs with their neighbors near and far. We are only able to do this with financial support from our listeners. Help KOOP keep community radio alive in Austin!</p>
								<a class="btn btn-outline-light" href="/donate">Donate Today</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		'; ?>

		<?php get_template_part( 'partials/sponsors' ); ?>

<?php get_footer(); ?>
