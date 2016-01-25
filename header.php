<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>
	<header>
		<!-- Search form -->
		<?php get_search_form(); ?>

		<!-- Visible header -->
		<div class="c_align">
			<div class="logo">
				<h1>
					<a href="<?php echo esc_url( home_url() ) ?>"><?php bloginfo( 'name' ); ?></a>
					<?php if(get_bloginfo( 'description' )): ?>
					<small><?php bloginfo( 'description' ); ?></small>
					<?php endif; ?>
				</h1>
			</div>
			<nav>
				<div>
					<ul>
						<li><a href="#" class="open-menu">
							<i class="fa fa-bars"></i> <?php _e( "Menu", "philomina" ); ?>
						</a></li>
						<li><a href="#" class="open-search">
							<i class="fa fa-search"></i>
							<i class="fa fa-close" style="display:none;"></i>
						</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>