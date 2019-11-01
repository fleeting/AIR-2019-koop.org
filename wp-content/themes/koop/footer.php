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
						<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/koop_logo_footer.svg" alt="KOOP Logo" />
					</div>
					<nav id="nav_footer" role="navigation" aria-label="Footer Navigation">
						<?php wp_nav_menu( array( 'container_class' => 'menu_footer', 'theme_location' => 'footer', 'depth' => 1, 'menu_id'  => 'menu_footer', ) ); ?>
					</nav>
					<div class="connect">
						<div class="connect_label">Connect with us:</div>
						<nav id="nav_footer_social" role="navigation" aria-label="Social Media Accounts Navigation">
							<?php wp_nav_menu( array( 'container_class' => 'menu_footer_social', 'theme_location' => 'footer-social', 'depth' => 1, 'menu_id'  => 'menu_footer_social', ) ); ?>
						</nav>
					</div>
					<p class="copyright">KOOP is licensed by the Federal Communications Commission as a non-commercial educational broadcasting co-operative. Copyright © <?php echo date('Y'); ?> KOOP Radio</p>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>