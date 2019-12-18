<?php get_header(); ?>

	<section id="featured_shows">
		<div class="home featured_shows">
			<div class="row">
				<div class="col-12">
					<h2>Featured Shows</h2>
				</div>
				<?php
					//GET DATA


					//SHOW DATA
					echo '
						<div class="col-lg-4">
							<div class="featured_show">
								<div class="image">
									<img class="" src="' . get_template_directory_uri() .'/images/dist/fpo-show.jpg" alt="">
								</div>
								<p class="date">Tuesday 10/15, 11:00am</p>
								<div class="info">
									<h3><a href="" title="">The Dark End of the Street</a></h3>
									<p>Down-home Southern Soul from the heyday of Memphis, Nashville. & Muscle Shoals</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="featured_show">
								<div class="image">
									<img class="" src="' . get_template_directory_uri() .'/images/dist/fpo-show.jpg" alt="">
								</div>
								<p class="date">Tuesday 10/15, 11:00am</p>
								<div class="info">
									<h3><a href="" title="">The Dark End of the Street</a></h3>
									<p>Down-home Southern Soul from the heyday of Memphis, Nashville. & Muscle Shoals</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="featured_show">
								<div class="image">
									<img class="" src="' . get_template_directory_uri() .'/images/dist/fpo-show.jpg" alt="">
								</div>
								<p class="date">Tuesday 10/15, 11:00am</p>
								<div class="info">
									<h3><a href="" title="">The Dark End of the Street</a></h3>
									<p>Down-home Southern Soul from the heyday of Memphis, Nashville. & Muscle Shoals</p>
								</div>
							</div>
						</div>
					';
				?>
			</div>
		</div>
	</section>

	<div class="home recents">
		<div class="row">
			<div class="col-md-6">
				<section id="upcoming_events">
					<h2>Upcoming Events</h2>
					<?php
						//GET DATA


						//SHOW DATA
						echo '
							<ul>
								<li class="event_item">
									<div class="row no-gutters">
										<div class="col-md-3 date_info">
											Thu<br /><span class="date">10/17</span><br />4:00 pm
										</div>
										<div class="col-md-9 text">
											<h3><a href="" title="">91.7 Beer Release</a></h3>
											<p>We have teamed up with Black Star Co-op Pub & Brewery to bring you a super sessionable pale ale we...</p>
										</div>
									</div>
								</li>
								<li class="event_item">
									<div class="row no-gutters">
										<div class="col-md-3 date_info">
											Thu<br /><span class="date">10/17</span><br />4:00 pm
										</div>
										<div class="col-md-9 text">
											<h3><a href="" title="">91.7 Beer Release</a></h3>
											<p>We have teamed up with Black Star Co-op Pub & Brewery to bring you a super sessionable pale ale we...</p>
										</div>
									</div>
								</li>
								<li class="event_item">
									<div class="row no-gutters">
										<div class="col-md-3 date_info">
											Thu<br /><span class="date">10/17</span><br />4:00 pm
										</div>
										<div class="col-md-9 text">
											<h3><a href="" title="">91.7 Beer Release</a></h3>
											<p>We have teamed up with Black Star Co-op Pub & Brewery to bring you a super sessionable pale ale we...</p>
										</div>
									</div>
								</li>
							</ul>
						';
					?>
				</section>
			</div>
			<div class="col-md-6">
				<section id="latest_news">
					<h2><a href="/news">Latest News</a></h2>
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
