<?php get_header() ?>

	<section id="internal" class="page-wrapper">
		<?php
			// -------------------
			// == Posts Query
			// -------------------
			while( have_posts() ): the_post();
		?>
		<div class="content">
			<div class="section_head" style="background-image:url(<?php philomina_featuredBg( $post ); ?>);">
				<div class="c_align">
					<a href="#comments" class="go_to_comments"><i class="fa fa-commenting"></i> <?php _e('Read Comments', 'philomina'); ?></a>
					<h1><?php the_title(); ?></h1>
					<div class="post-info">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), '100' ); ?>
						<div>
							<small><?php _e( 'By', 'philomina' ); ?> <?php the_author_posts_link(); ?></small>
							<small><?php the_date(); ?></small>
						</div>
					</div>
				</div>
			</div>
			<div class="post_container c_align">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
						the_content();
						// == Post Pagination

					 	$defaults = array(
							'before'           => '<hr><div class="post-pagination c_align">',
							'after'            => '</div>',
							'next_or_number'   => 'next',
							'separator'        => ' ',
							'nextpagelink'     => __( 'Next page' , 'philomina' ),
							'previouspagelink' => __( 'Previous page', 'philomina' ),
							'pagelink'         => '%',
							'echo'             => 1
						);
					    wp_link_pages( $defaults );

					    // == post tags
					    echo "<div class='tags'><strong>" . __('Tags', 'philomina') . ":</strong> ";
					    the_tags( false, ", ", false );
					    echo "<hr> <strong>" . __('Categories', 'philomina') . "</strong> ";
					    the_category( ', ' );
					    echo "</div>";

						// == Comments
						comments_template();
					?>
				</article>
				<?php get_sidebar(); ?>
			</div>
		</div>

		<?php
			endwhile;
		?>

<?php get_footer() ?>