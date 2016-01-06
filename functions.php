<?php
// ------------------------------
// == Theme Support
// ------------------------------
	if ( ! isset( $content_width ) ) {
		$content_width = 2000;
	}
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );

// ------------------------------
// == Languages Support
// ------------------------------

	add_action( 'after_setup_theme', 'my_theme_setup' );
	function my_theme_setup(){
	    load_theme_textdomain( 'philomina', get_template_directory() . '/assets/languages' );
	}

// ------------------------------
// == Enqueue Styles & Scripts
// ------------------------------
	add_action( 'wp_enqueue_scripts', 'philomina_main_dependancies' );
	function philomina_main_dependancies() {
	    wp_enqueue_style( 'philomina_main_style', get_stylesheet_uri() );
		wp_enqueue_style( 'philomina_font_awesome', get_template_directory_uri() . '/font-awesome.css' );
	    wp_enqueue_style( 'philomina_fancybox_css', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.css' );
	    wp_enqueue_script( 'philomina_html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js' );
	    wp_enqueue_script( 'philomina_main_scripts', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ) );
	    wp_enqueue_script( 'philomina_fancybox_js', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.js', array( 'jquery' ) );
	    if ( is_singular() ) {
			wp_enqueue_script( "comment-reply" );
		}
	}

	add_action( 'admin_init', 'philomina_editor_styles' );
	function philomina_editor_styles() {
	    add_editor_style( get_template_directory_uri() . '/editor-style.css' );
	}

// ------------------------------
// == Menu
// ------------------------------
	register_nav_menus( array(
	    'main_menu' => 'Main Menu'
	) );
// ------------------------------
// == Google Penguin Friendly Credits
// ------------------------------
	function philomina_creditLink() {
		//  DEFAULT VALUES
		$noFollow = ""; // Add rel="nofollow" to credit link on all internal pages
		$anchorText = __( "WordPress theme developed by Wastronauts LTD", "philomina" ); // Different Anchor Text in Home Page and internal pages
		$linkTitle = __( "UK Web Designer", "philomina" ); // Link Title
		$linkTarget = esc_url( "http://wastronauts.com/" ); // Static URL

		if( !is_front_page() ) {
			$noFollow = "rel='nofollow'";
			$anchorText = __( "Website Credits", "philomina" );
			$linkTitle = __( "WordPress theme developed by Wastronauts LTD", "philomina" );
		}

		// Echo Credit Link
		echo "<a href='$linkTarget'" . $noFollow . " title='$linkTitle'>$anchorText</a>";
	}
// ------------------------------
// == Image Sizes
// ------------------------------
	add_image_size('featured', 800, 800, true );
// ------------------------------
// == Featured Image & Placeholders
// ------------------------------
	function philomina_featuredBg( $post ) {
		$featured = false;
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) , 'featured' );
		$featured = $thumbnail['0'];
		if( !$featured ) {
			$featured = get_template_directory_uri() . "/assets/img/no-img.png";
		}
		echo esc_url( $featured );
	}
// ------------------------------
// == Sidebar
// ------------------------------
	function philomina_sidebar() {
		register_sidebar( array(
			'name' 			=> __( "Post Sidebar" , "philomina" ),
			'id'            => 'post-sidebar',
			'description'   => __( "Sidebar located on the right side of your articles" , "philomina" ),
			'before_widget' => '<div class="widget">',
			'before_title' 	=> '<h3>',
			'after_title' 	=> '</h3>',
			'after_widget' 	=> '</div>'
		) );
	}
	add_action( 'widgets_init' , 'philomina_sidebar' );
// ------------------------------
// == Comments
// ------------------------------
	function philomina_comments( $comment, $args, $depth ) {
			$GLOBALS['comment'] = $comment; ?>

			<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		        <div class="comment">
		            <div class="comment-info">
		            	<b><?php comment_author_link(); ?> <?php edit_comment_link( 'Edit', '- ' ) ?></b>
		            	<small><?php echo get_comment_date(); ?></small>
		            </div>
		            <div class="text">
		                <?php
		                	if ( $comment->comment_approved == '0' ) :
								echo "<p><em>" . __( 'Your comment is awaiting moderation.', 'philomina' ) . "</em></p>";
		                	else:
								comment_text();
		                	endif;
		                ?>
		                <div class="clear"></div>
		            </div>
		        </div>
	<?php }
?>