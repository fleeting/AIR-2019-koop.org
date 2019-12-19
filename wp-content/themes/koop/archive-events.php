<?php get_header(); ?>

<section id="primary" class="content-area">
		<div class="container" role="main">

			<div class="col-md-12">
				<section id="latest_events">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
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
							<?php endwhile; // End of the loop. ?>
								</ul>
								<div id="pagination" class="clearfix">
								    <?php posts_nav_link(); ?>
								</div>
					</section>
				</div>
			</div>
		</div>

			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
