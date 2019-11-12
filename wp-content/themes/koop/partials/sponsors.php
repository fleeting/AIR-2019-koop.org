

<section>
  <div class="home sponsors">
    <div class="row">
      <div class="col-md-6 leadin">
        <div class="content">
          <h2>Our Sponsors</h2>
          <p>All product and company names are trademarks™ or registered® trademarks of their respective holders. Use of them does not imply any affiliation with or endorsement by them.</p>
        </div>
      </div>
      <div class="col-12 logos">

        <?php $args = array(
        		'post_type' => 'Sponsors',
        		'posts_per_page' => -1,
        	);
          $loop = new WP_Query( $args );
        	 while ( $loop->have_posts() ) : $loop->the_post();
           $logo = get_field('sponsor_logo');?>

           <img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>">

        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>
