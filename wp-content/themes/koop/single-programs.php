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
		          echo '<h3>Show Times</h3> <ul>';
		          while ( have_rows( 'show_schedule' ) ) : the_row();
		            echo '<li><strong>' . get_sub_field( 'day' ) . '</strong>: ' . get_sub_field( 'start_time' ) . ' - ' . get_sub_field( 'end_time' ) . '</li>';
		          endwhile;
		          echo '</ul>';
		        endif;
		        ?>

		        <?php
		        $social_networks = get_field( 'social_networks' );

		        echo '<h3>Social Networks</h3> <ul>';
		        foreach($social_networks as $network => $profile_url):
							if(!empty($profile_url)):
								if($network === 'facebook_url') { ?>
		            	<li><a href="<?= $profile_url; ?>" title="Like us on Facebook">Facebook</a></li>
								<?php } elseif($network === 'twitter_url') { ?>
									<li><a href="<?= $profile_url; ?>" title="Follow us on Twitter">Twitter</a></li>
								<?php } elseif($network === 'instagram_url') { ?>
									<li><a href="<?= $profile_url; ?>" title="Follow us on Instagram">Instagram</a></li>
								<?php }
		          endif;
		        endforeach;
		        echo '</ul>';
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
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
