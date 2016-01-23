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
					<h1 class="full"><?php the_title() ?></h1>
				</div>
			</div>
			<div class="post_container c_align">
				<article class="full">
					<?php
					the_content();

					echo "<hr style='margin: 60px 0;'>";

					// == Comments
					comments_template();
					?>
				</article>
			</div>
		</div>
		<?php
			endwhile;
		?>

<?php get_footer() ?>