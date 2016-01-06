		<!--
			Footer Content
		-->
		<footer>
			<div class="c_align">
				<div class="copy">
					<p>&copy; <?php echo date("Y") . " "; bloginfo( 'name' ); ?>. <?php _e( "All rights reserved", "philomina" ) ?>.</p>
				</div>
				<div class="credits">
					<p>
						<?php philomina_creditLink() ?>
					</p>
				</div>
			</div>
		</footer>

	</section>

	<!--
		Preloader
	-->

	<div class="preloader loadIn">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/preloader.GIF' ); ?>">
	</div>

	<!--
		Menu
	-->

	<nav class="hidden-menu">
		<div>
			<a href="#" class="close-menu"><?php _e( "Close", "philomina" ) ?> <i class="fa fa-close"></i></a>
 			<?php
				wp_nav_menu('theme_location=main_menu');
 			?>
		</div>
	</nav>

	<!--
		WordPress
	-->
	<?php wp_footer() ?>

</body>
</html>
