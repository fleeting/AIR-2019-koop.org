<?php get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container" role="main">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php $featured_image = get_field( 'featured_image' ); ?>
        <p><img src="<?= $featured_image['url']; ?>" alt="<?= $featured_image['alt']; ?>"></p>

        <p><strong>Host(s)</strong>: <?= the_field('hosts'); ?></p>

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
            echo '<li>' . $profile_url . '</li>';
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

        <?php get_template_part( 'partials/page-builder' ); ?>

      <?php endwhile; endif; // end loop. ?>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
