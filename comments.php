<?php if ( !post_password_required() ) : ?>

	<?php if ( have_comments() ) : ?>
		<div id="comments">
			<h2>
		        <i class="fa fa-commenting"></i>
		        <?php comments_number();  ?>
		    </h2>
		    <ul class="comment-list">
		        <?php wp_list_comments( array( 'callback' => 'philomina_comments' ) );?>
		    </ul>

		    <div class="post-pagination c_align"><?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') ) ?></div>
		</div>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<div id="comment-form">
		    <?php comment_form(); ?>
		</div>
	<?php endif; ?>

<?php endif; ?>