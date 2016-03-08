		<?php
			// -------------------
			// == Posts Query
			// -------------------
			if( have_posts() ):

				// == Search String, Archive Title & Page number
				if( is_front_page() && is_paged() ):
					$page = get_query_var( 'paged', 1 );
					echo "<div class='info c_align'><p>" . __( "Page", "philomina" ) . " $page</p></div>";
				elseif( !is_front_page() ):
					$isPaged = "";
					if( is_paged() ) {
						$page = get_query_var( 'paged' ); $isPaged = " - " . __( "Page", "philomina" ) . " $page";
					}
					if( get_search_query() ) :
						echo "<div class='info c_align'><p>" . __( 'Search Results for: ', 'philomina') . get_search_query() . "$isPaged</p></div>";
					elseif(get_the_author()) :
						echo "<div class='info c_align'><p>" . __( 'Articles by: ', "philomina" ) . get_the_author() . "$isPaged</p></div>";
					else :
						echo "<div class='info c_align'><p>" . single_cat_title( __('Articles in: ', 'philomina'), false ) . "$isPaged</p></div>";
					endif;
				endif;

				// == For Each Post
				$philomina_n = 0;
				while( have_posts() ):
					the_post();
					$philomina_n++;
		?>
		<div id="post-<?php the_ID(); ?>" <?php post_class( array( 'block','w4' ) ); ?> style="background-image:url(<?php philomina_featuredBg( $post ); ?>)">
			<div class="inside_block">
				<h1><?php the_title(); ?></h1>
				<a href="<?php the_permalink() ?>" class="continue"><?php _e( "Continue", "philomina" ) ?></a>
			</div>
		</div>
		<?php
					if( $philomina_n == 3 ) {
						$philomina_n = 0;
					}
				endwhile;
			else:
		?>
		<div class="info c_align no-content">
			<p>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/error.png' ); ?>" height="256" width="256" alt="<?php _e('Error - no post found', 'philomina'); ?>">
			</p>
			<p><?php _e( "No Post Found in this page.", "philomina" ); ?></p>
			<p><?php _e( "For more information please contact the website administrator.", "philomina" ); ?></p>
			<p>-</p>
			<p><?php _e( "Return to to", "philomina" ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php _e( "Home Page", "philomina" ); ?></a></p>
		</div>

		<?php
			endif;
		?>
		<!-- clear -->
		<div class="c"></div>

		<div class="pagination c_align">
			<?php
				// -------------------
				// == Posts Pagination
				// -------------------
				$sep = " ";
				$prelabel = '&lsaquo; ' . __( "Back", "philomina" );
				$nextlabel = __( "More", "philomina" ) . ' &rsaquo;';
				posts_nav_link( $sep, $prelabel, $nextlabel );
			?>
		</div>