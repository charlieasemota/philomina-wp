<form method="get" name="searchform" action="<?php echo esc_url( home_url() ) ?>/" class="search-form">
	<div class="c_align">
		<input type="text" name="s" placeholder="<?php _e( "Search...", "philomina" ) ?>"/>
		<input type="submit" name="search" value="<?php _e( "Go", "philomina" ) ?>"/>
	</div>
</form>