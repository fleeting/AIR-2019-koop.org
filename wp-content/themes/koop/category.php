<?php get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container" role="main">

			<div class="col-md-12">
				<section id="latest_news">
          <?php get_template_part( 'partials/cat-select' ); ?>

        <?php
        // Check if there are any posts to display
        if ( have_posts() ) :
          $categories = get_the_category();
          if ( $categories ) :
            $single_category_link = esc_url( get_category_link( $categories[0]->term_id ) );
            $single_category_name = esc_html( $categories[0]->name );
          endif ?>
          <?php while ( have_posts() ) : the_post(); ?>
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

      <?php endwhile; ?>
      <div id="pagination" class="clearfix">
          <?php posts_nav_link(); ?>
      </div>

      <?php else: ?>
        <p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>
        </section><!-- #latest_news -->
      </div><!-- .col-md-12r -->

    </div><!-- .container -->
  </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
