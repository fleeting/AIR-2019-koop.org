<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="favicon.png">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<a class="skip-link" href="#page">Skip to main content</a>

	<header id="header" class="bg_fill" role="banner">
		<div class="topper">
			<div class="row">
				<div class="col-md-8 now-playing">
					<a id="launch_player" class="btn btn-outline-light" title="Listen to KOOP Radio live on the web" href="/listen-live/"><i class="fal fa-play"></i> Listen Live</a>

					<div class="current_program">
						<img class="show_thumbnail" src="<?php echo get_template_directory_uri(); ?>/images/dist/fpo-program-150.png" alt="Austin Artists show poster.">
						<p><span class="label">Now Playing</span><br />
							<strong class="js-currentShow">KOOP Radio</strong> | <span class="js-currentShowTime"></span></p>
					</div>
				</div>

				<div class="col-md-4 donate">
					<a class="btn btn-outline-light" title="Donate" href="/donate"><i class="fal fa-piggy-bank"></i> Donate</a>
				</div>
			</div>
		</div>

		<div class="main">
			<div class="row">
				<div class="col-lg-3 col-md-10 col-sm-10 col-10 logo_area">
					<a class="btn btn-outline-light btn-donate" title="Help support KOOP Radio with a donation." href="#"><i class="fal fa-piggy-bank"></i> Donate</a>
					<a href="/" title="KOOP Radio Homepage"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/dist/koop_logo_header.svg" alt="KOOP 91.7 FM"></a>
				</div>

				<div class="col-lg-9 col-md-12 col-sm-12 col-12 navigation">
					<nav id="nav_header" role="navigation" aria-label="Main Menu">
						<?php if (has_nav_menu('primary')) : ?>
							<div class="menu-container">
								<button class="menu-button"><span class="sr-only">Menu</span></button>

								<div id="site-header-menu" class="site-header-menu">
									<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'yourtheme'); ?>">
										<?php
											wp_nav_menu(array(
												'theme_location' => 'primary',
												'depth' => 2,
											));
										?>
									</nav>
								</div>
							</div>
						<?php endif; ?>
					</nav>
				</div>
			</div>
		</div>

		<?php
			if (is_front_page()) {
				$args = array (
					'post_type' => array( 'homepage_hero' ),
					'post_status' => array( 'publish' ),
					'posts_per_page' => 1,
					'order' => 'DESC',
					'orderby' => 'date',
				);

				$homepage_hero = new WP_Query( $args );

				if ( $homepage_hero->have_posts() ) {
					while ( $homepage_hero->have_posts() ) { $homepage_hero->the_post(); ?>
						<section>
							<div class="home feature">
								<div class="row">
									<div class="col-md-6 image">
										<div class="content">
											<?php $hero_image = get_field( 'image' ); ?>
											<img src="<?= $hero_image['url']; ?>" alt="<?= $hero_image['alt']; ?>">
										</div>
									</div>
									<div class="col-md-6 text">
										<div class="content">
											<h1><?= the_title(); ?></h1>
											<?php if(!empty(get_field( 'sub_title' ))) { ?><p class="date"><strong><?= get_field( 'sub_title' ); ?></strong></p><?php } ?>

											<p><?= get_field( 'description' ); ?></p>

											<?php if(!empty(get_field( 'button_text' )) && !empty(get_field( 'button_link' ))) { ?>
												<a class="btn btn-outline-light" title="More information on <?= the_title(); ?>" href="<?= get_field( 'button_link' ); ?>"><?= get_field( 'button_text' ); ?></a>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</section>
					<?php }
				}

				wp_reset_postdata();
			} elseif (is_singular('programs')) {
				echo '
					<div class="page_title">
						<h1>' . get_the_title() .'</h1>
						<p><strong>Host(s)</strong>: ' . get_field('hosts') . '</p>
				s	</div>
				';
			} elseif (is_post_type_archive( 'news')) {
				echo '
					<div class="page_title">
						<h1>Latest News</h1>
					</div>
				';
			} elseif (is_post_type_archive( 'events')) {
				echo '
					<div class="page_title">
						<h1>Upcoming Events</h1>
					</div>
				';
			} else {
				echo '
					<div class="page_title">
						<h1>' . get_the_title() .'</h1>
					</div>
				';
			}
		?>
	</header>

	<div id="page" class="site">
