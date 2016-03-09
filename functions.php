<?php
if ( ! isset( $content_width ) ) {
	$content_width = 2000;
}

add_action( 'after_setup_theme', 'philomina_theme_setup' );
function philomina_theme_setup(){
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_image_size('philomina_featured', 800, 800, true );
    load_theme_textdomain( 'philomina', get_template_directory() . '/languages' );
}

add_action( 'wp_enqueue_scripts', 'philomina_main_dependancies' );
function philomina_main_dependancies() {
    wp_enqueue_style( 'philomina-main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.css' );
	wp_enqueue_style( 'philomina-google-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:400italic|Lato:400,300,300italic,400italic,700,700italic' );
    wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.css' );
    wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js' );
    wp_enqueue_script( 'philomina-main-scripts', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ) );
    wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.js', array( 'jquery' ) );
    if ( is_singular() ) {
		wp_enqueue_script( "comment-reply" );
	}
}

add_action( 'admin_init', 'philomina_editor_styles' );
function philomina_editor_styles() {
	$philomina_font_url = str_replace(',', '%2C', '//fonts.googleapis.com/css?Lato:400,300,300italic,400italic,700,700italic' );
    $philomina_stylesheet = get_template_directory_uri() . '/editor-style.css';
    add_editor_style( array($philomina_font_url, $philomina_stylesheet));
}

register_nav_menus( array(
    'main_menu' => __('Main Menu', 'philomina')
) );

function philomina_creditLink() {
	// Echo Credit Link
	echo "<a href='" . esc_url( "http://wastronauts.com/" ) . "' title='WordPress Web Designer'>" . __('WordPress Theme designed by Wastronauts', 'philomina') . "</a>";
}

function philomina_featuredBg( $post ) {
	$featured = false;
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) , 'philomina_featured' );
	$featured = $thumbnail['0'];
	if( !$featured ) {
		$featured = get_template_directory_uri() . "/assets/img/no-img.png";
	}
	echo esc_url( $featured );
}

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