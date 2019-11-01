<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="favicon.png" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#main">Skip to content</a>
	<header id="header" class="bg_fill" role="banner">
		<div class="topper">
			<div class="row">
				<div class="col-md-8 now-playing">
					<a id="launch_player" class="btn btn-outline-light" title="Open Streaming Player" href="#"><i class="fal fa-play"></i> Listen Live</a>
					<div class="current_program">
						<img class="show_thumbnail" src="<?php echo get_template_directory_uri(); ?>/img/fpo-program-150.png" alt="Monkeeying Around" />
						<p><span class="label">Now Playing</span><br /><strong>Monkeeing Around</strong> | Dat Moustache by James Fleeting</p>
					</div>
				</div>
				<div class="col-md-4 donate">
					<a class="btn btn-outline-light" title="Donate" href="#"><i class="fal fa-piggy-bank"></i> Donate</a>
				</div>
			</div>
		</div>
		<div class="main">
			<div class="row">
				<div class="col-lg-3 col-md-10 col-sm-10 col-10 logo_area">
					<a class="btn btn-outline-light btn-donate" title="Donate" href="#"><i class="fal fa-piggy-bank"></i> Donate</a>
					<a href="/" title="KOOP Radio Homepage"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/koop_logo_header.svg" alt="KOOP Logo" /></a>
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
				//GET DATA FOR FEATURE
				
				//SHOW FEATURE
				echo '
					<section>
						<div class="home feature">
							<div class="row">
								<div class="col-md-6 image">
									<div class="content">
										<img src="/wp-content/uploads/2019/10/austin-skyline-1.jpg" alt="FPO Image" />
									</div>
								</div>
								<div class="col-md-6 text">
									<div class="content">
										<h1>Live Seance Benefiting KOOP Radio</h1>
										<p class="date"><strong>Thursday, October 24th at 7:00pm</strong></p>
										<p>On Thursday, October 24th at 7 PM, join us at the Museum of Human Achievement as A. Lucio and Jake Cordero of Austin Seance demonstrate tools used by working mediums and then employ those tools in...</p>
										<a class="btn btn-outline-light" title="Live Seance Benefiting KOOP Radio" href="#">Visit Event</a>
									</div>
								</div>
							</div>
						</div>
					</section>
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
		
		