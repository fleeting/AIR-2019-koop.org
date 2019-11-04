		</div>

		<footer id="footer" role="contentinfo" class="bg_fill">
			<div class="row">
				<div class="col-md-6 order-md-last">
					<h6>Sign Up For Our Newsletter</h6>
					<p style="margin-bottom: 0px;">All fields with an * are required.</p>
					<?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true tabindex=100]'); ?>
				</div>

				<div class="col-md-6 order-md-first">
					<div class="logo_area">
						<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/dist/koop_logo_footer.svg" alt="KOOP Logo">
					</div>

					<nav id="nav_footer" role="navigation" aria-label="Footer Navigation">
						<?php wp_nav_menu( array( 'container_class' => 'menu_footer', 'theme_location' => 'footer', 'depth' => 1, 'menu_id'  => 'menu_footer', ) ); ?>
					</nav>

					<div class="connect">
						<div class="connect_label">Connect with us:</div>
						<nav id="nav_footer_social" role="navigation" aria-label="Social Media Accounts Navigation">
							<ul id="menu_footer_social" class="menu">
								<?php if(!empty(get_field('facebook_url', 'option'))) { ?>
									<li><a href="<?php the_field('facebook_url', 'option'); ?>"><i class="fab fa-facebook-f fa-2x" title="KOOP on Facebook" aria-hidden="true"></i><span class="sr-only">Facebook</span></a></li>
								<?php } ?>

								<?php if(!empty(get_field('twitter_url', 'option'))) { ?>
									<li><a href="<?php the_field('twitter_url', 'option'); ?>"><i class="fab fa-twitter fa-2x" title="KOOP on Twitter" aria-hidden="true"></i><span class="sr-only">Twitter</span></a></li>
								<?php } ?>

								<?php if(!empty(get_field('instagram_url', 'option'))) { ?>
									<li><a href="<?php the_field('instagram_url', 'option'); ?>"><i class="fab fa-instagram fa-2x" title="KOOP on Instagram" aria-hidden="true"></i><span class="sr-only">Instagram</span></a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>

					<p class="copyright"><?php the_field('copyright', 'option'); ?></p>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>
