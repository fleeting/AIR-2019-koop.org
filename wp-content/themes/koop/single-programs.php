<?php get_header(); ?>

<!-- TODO: Just dumping out all the data for now. Need to style this page pending suggestions from Design. -->

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container" role="main">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="program-box">
					<div class="program-left">
	        	<?php $featured_image = get_field( 'featured_image' ); ?>
						<img src="<?= $featured_image['url']; ?>" alt="<?= $featured_image['alt']; ?>">
					</div>
					<div class="program-right">
		        <?php
		        if( have_rows( 'show_schedule' ) ):
		          echo '<h3>Show Times</h3> <ul class="unstyled">';
		          while ( have_rows( 'show_schedule' ) ) : the_row();
		            echo '<li><strong>' . get_sub_field( 'day' ) . '</strong>: ' . get_sub_field( 'start_time' ) . ' - ' . get_sub_field( 'end_time' ) . '</li>';
		          endwhile;
		          echo '</ul>';
		        endif;
		        ?>

		        <?php
						$social_networks = get_field( 'social_networks' );
						if(!empty($social_networks['facebook_url']) || !empty($social_networks['twitter_url']) || !empty($social_networks['instagram_url'])):
								echo '<h3>Social Networks</h3> <ul class="unstyled inline">';
								foreach($social_networks as $network => $profile_url):
									if(!empty($profile_url)):
										if($network === 'facebook_url') { ?>
											<li><a href="<?= $profile_url; ?>"><i class="fab fa-facebook-f fa-2x" title="Like us on Facebook" aria-hidden="true"></i></a></li>
										<?php } elseif($network === 'twitter_url') { ?>
											<li><a href="<?= $profile_url; ?>" ><i class="fab fa-twitter fa-2x" title="Follow us on Twitter" aria-hidden="true"></i></a></li>
										<?php } elseif($network === 'instagram_url') { ?>
											<li><a href="<?= $profile_url; ?>" ><i class="fab fa-instagram fa-2x" title="Follow us on Instagram" aria-hidden="true"></i></a></li>
										<?php } elseif($network === 'website_url') { ?>
											<!--<li><a href="<?= $website_url; ?>" >Visit Our Website</a></li>-->
										<?php }
									endif;
								endforeach;
								echo '</ul>';
						endif;
		        ?>

		        <?php
		        $contact_info = get_field( 'contact_info' );

		        echo '<h3>Contact</h3>';
		        echo '<p><strong>Email</strong>: ' . $contact_info['email_address'] . '<br />
		          <strong>Mailing Address</strong>: ' . $contact_info['mailing_address'] . '</p>';
		        ?>
					</div>
				</div>

				<div class="description">
	        <?php get_template_part( 'partials/page-builder' ); ?>
				</div>

      <?php endwhile; endif; // end loop. ?>

			<div style="clear:both;">
				<section id="program-blog">
					<h2>Show Posts</h2>

					<?php
						$title_current_post = get_the_title();
						$args = array(
							'posts_per_page' => -1,
						);
						$loop = new WP_Query( $args ); ?>
						<ul>
						 <?php while ( $loop->have_posts() ) : $loop->the_post();
						 $post_objects = get_field('program');
						 if( $post_objects ): ?>
						    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post);
										$title_blog_post = get_the_title();
										if ( $title_current_post == $title_blog_post ) : ?>
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
										<?php endif; ?>
						    <?php endforeach; ?>
						<?php endif; ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</section>
			</div>
		</div>

	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
